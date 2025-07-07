﻿using ApiHotelesBeach.Data;
using ApiHotelesBeach.Dto;
using ApiHotelesBeach.Models;
using ApiHotelesBeach.Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using Microsoft.VisualStudio.Web.CodeGenerators.Mvc.Templates.BlazorIdentity.Pages.Manage;
using Newtonsoft.Json;
using System.Globalization;

namespace ApiHotelesBeach.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class ReservasController : Controller
    {
        private readonly DbContextHotel _context = null;
        private readonly InvoiceService _invoiceService;
        private readonly IServicioEmail _servicioEmail;
        private readonly ILogger<ReservasController> _logger;

        public ReservasController(DbContextHotel pContext, InvoiceService invoiceService, IServicioEmail servicioEmail, ILogger<ReservasController> logger)
        {
            _context = pContext;
            _invoiceService = invoiceService;
            _servicioEmail = servicioEmail;
            _logger = logger;
        }

        [Authorize]
        [HttpGet("Listado")]
        public List<Reserva> Listado()
        {
            List<Reserva> reservas = null;
            reservas = _context.Reservas
                .Include(a => a.Usuario)
                .Include(a => a.Paquete)
                .Include(a => a.FormaPago)
                .ToList();
            return reservas;
        }

        [HttpPost("enviar-correo")]
        public async Task<IActionResult> EnviarCorreo([FromBody] EmailRequestDto emailRequest)
        {
            try
            {
                await _servicioEmail.EnviarEmail(emailRequest.EmailReceptor, emailRequest.Tema, emailRequest.Cuerpo);
                return Ok("Correo enviado exitosamente.");
            }
            catch (Exception ex)
            {
                return StatusCode(500, $"Error al enviar el correo: {ex.Message}");
            }
        }

        [Authorize]
        [HttpPost("Agregar")]
        public async Task<IActionResult> Agregar([FromBody] ReservaCreateDto reservaDto)
        {
            if (reservaDto == null)
            {
                return BadRequest("La reservación no puede ser nula.");
            }

            var usuarioExiste = await _context.Usuarios.FirstOrDefaultAsync(u => u.Cedula == reservaDto.ClienteCedula);
            if (usuarioExiste == null)
            {
                return NotFound("No se encontró un usuario con esa cédula.");
            }

            var paqueteExiste = await _context.Paquetes.FindAsync(reservaDto.PaqueteId);
            if (paqueteExiste == null)
            {
                return NotFound("El paquete elegido no existe.");
            }

            var formaPago = CrearFormaPago(reservaDto);

            if (formaPago != null)
            {
                try
                {
                    _context.FormasPago.Add(formaPago);
                    await _context.SaveChangesAsync();
                }
                catch (Exception ex)
                {
                    return StatusCode(500, $"Error al guardar la forma de pago: {ex.Message}");
                }
            }
            var descuento = 0.0m;
            if (reservaDto.NombreFormaPago.ToLower() == "efectivo")
            {
                descuento = CalcularDescuento(reservaDto.CantidadNoches);
            }

            var montoTotal = (paqueteExiste.Costo * reservaDto.CantidadPersonas) * reservaDto.CantidadNoches;
            var montoDescuento = montoTotal - (montoTotal * descuento);
            var prima = montoDescuento * paqueteExiste.Prima;
            var pagoMes = (montoDescuento - prima) / paqueteExiste.Mensualidades;

            decimal montoTotalColones;
            try
            {
                montoTotalColones = await ConvertirAColones(montoTotal);
            }
            catch (Exception ex)
            {
                return StatusCode(500, $"Error al calcular el monto en colones: {ex.Message}");
            }

            var reserva = new Reserva
            {
                CantidadNoches = reservaDto.CantidadNoches,
                CantidadPersonas = reservaDto.CantidadPersonas,
                Descuento = (int)(descuento * 100),
                MontoRebajado = montoDescuento,
                MontoFinal = montoTotal,
                MontoFinalColones = montoTotalColones,
                Prima = prima,
                PagoMes = pagoMes,
                PaqueteId = reservaDto.PaqueteId,
                FormaPagoId = formaPago != null ? formaPago.Id : 1,
                ClienteCedula = reservaDto.ClienteCedula
            };

            try
            {
                _context.Reservas.Add(reserva);
                await _context.SaveChangesAsync();
            }
            catch (Exception ex)
            {
                return StatusCode(500, $"Error al crear la reserva: {ex.Message}");
            }

            // Generar el PDF después de guardar la reserva
            var pdfResult = GenerarPDF(reserva.Id);
            if (pdfResult is NotFoundObjectResult)
            {
                return StatusCode(500, "No se pudo generar el PDF de la reserva.");
            }

            // Crear un archivo adjunto con el PDF generado
            var pdfBytes = ((FileContentResult)pdfResult).FileContents;

            // Crear el email y enviarlo con el PDF adjunto
            var emailRequest = new EmailRequestDto
            {
                EmailReceptor = usuarioExiste.Email,
                Tema = "Confirmación de Reserva",
                Cuerpo = "¡Gracias por tu reserva! Aquí tienes el PDF con los detalles de la misma.",
                ArchivosAdjuntos = new List<AdjuntoDto>
        {
            new AdjuntoDto
            {
                NombreArchivo = $"Reserva_{reserva.Id}.pdf",
                Contenido = pdfBytes
            }
        }
            };

            // Validación de los parámetros antes de enviar el correo
            if (string.IsNullOrEmpty(emailRequest.EmailReceptor))
            {
                return BadRequest("El correo electrónico del receptor no puede estar vacío.");
            }
            if (string.IsNullOrEmpty(emailRequest.Tema))
            {
                return BadRequest("El tema del correo no puede estar vacío.");
            }
            if (string.IsNullOrEmpty(emailRequest.Cuerpo))
            {
                return BadRequest("El cuerpo del correo no puede estar vacío.");
            }
            if (emailRequest.ArchivosAdjuntos == null || emailRequest.ArchivosAdjuntos.Count == 0)
            {
                return BadRequest("El correo debe contener al menos un archivo adjunto.");
            }

            try
            {
                await _servicioEmail.EnviarEmailConAdjuntos(emailRequest);
                return Ok(new { mensaje = "Reserva realizada con éxito y el PDF ha sido enviado por correo." });
            }
            catch (Exception ex)
            {
                _logger.LogError(ex, "Error al enviar el correo: {Message}", ex.Message);
                return StatusCode(500, $"Error al enviar el correo: {ex.Message}. Detalles del error: {ex.StackTrace}");
            }
        }

        [Authorize]
        [HttpGet("GenerarPDF/{id}")]
        public IActionResult GenerarPDF(int id)
        {
            var reserva = _context.Reservas
                .Include(a => a.Usuario)
                .Include(a => a.Paquete)
                .Include(a => a.FormaPago)
                .FirstOrDefault(x => x.Id == id);

            if (reserva == null)
            {
                return NotFound($"No se ha encontrado una reserva con el id: {id}");
            }

            var pdf = _invoiceService.GetInvoice(reserva);
            using (var stream = new MemoryStream())
            {
                pdf.Save(stream, false);
                var pdfBytes = stream.ToArray();

                return File(pdfBytes, "application/pdf", $"Reserva_{id}.pdf");
            }
        }

        private decimal CalcularDescuento(int cantidadNoches)
        {
            if (cantidadNoches >= 3 && cantidadNoches <= 6)
                return 0.10m;
            if (cantidadNoches >= 7 && cantidadNoches <= 9)
                return 0.15m;
            if (cantidadNoches >= 10 && cantidadNoches <= 12)
                return 0.20m;
            if (cantidadNoches > 13)
                return 0.25m;
            return 0.0m;
        }

        private async Task<decimal> ConvertirAColones(decimal montoEnDolares)
        {
            string apiUrl = "https://apis.gometa.org/tdc/tdc.json";
            decimal tipoCambio = 0;

            using (HttpClient client = new HttpClient())
            {
                try
                {
                    var response = await client.GetAsync(apiUrl);
                    if (response.IsSuccessStatusCode)
                    {
                        var jsonResponse = await response.Content.ReadAsStringAsync();

                        dynamic data = JsonConvert.DeserializeObject<dynamic>(jsonResponse);

                        if (data != null && data.venta != null)
                        {
                            tipoCambio = Convert.ToDecimal(data.venta.ToString(), CultureInfo.InvariantCulture);
                        }
                        else
                        {
                            throw new Exception("El campo 'venta' no se encontró en la respuesta de la API.");
                        }
                    }
                    else
                    {
                        throw new Exception($"Error en la solicitud a la API: {response.StatusCode}");
                    }
                }
                catch (Exception ex)
                {
                    Console.WriteLine($"Error al consultar la API: {ex.Message}");
                    throw new Exception("No se pudo obtener el tipo de cambio.");
                }
            }

            if (tipoCambio == 0)
            {
                throw new Exception("No se pudo obtener el tipo de cambio.");
            }

            decimal montoEnColones = montoEnDolares * tipoCambio;

            return montoEnColones;
        }

        private FormaPago CrearFormaPago(ReservaCreateDto reservaDto)
        {
            return reservaDto.NombreFormaPago.ToLower() switch
            {
                "tarjeta" => new FormaPago
                {
                    Nombre = reservaDto.NombreFormaPago,
                    Numero = reservaDto.Numero,
                    Banco = reservaDto.Banco,
                    CVV = reservaDto.CVV,
                    FechaExpiracion = reservaDto.FechaExpiracion,
                    NombreTitular = reservaDto.NombreTitular
                },
                "cheque" => new FormaPago
                {
                    Nombre = reservaDto.NombreFormaPago,
                    Numero = reservaDto.Numero,
                    NombreTitular = reservaDto.NombreTitular
                },
                _ => null
            };
        }

        [HttpGet("Buscar/{id}")]
        public IActionResult Buscar(int id)
        {
            Reserva reserva = _context.Reservas
                .Include(a => a.Usuario)
                .Include(a => a.Paquete)
                .Include(a => a.FormaPago)
                .FirstOrDefault(x => x.Id == id);

            if (reserva == null)
            {
                return NotFound($"No se ha encontrado una reserva con el id: {id}");
            }


            return Ok(reserva);
        }

        [HttpGet("BuscarPorUsuario/{cedula}")]
        public IActionResult BuscarPorUsuario(string cedula)
        {

            var reservas = _context.Reservas
                .Include(a => a.Usuario)
                .Include(a => a.Paquete)
                .Include(a => a.FormaPago)
                .Where(x => x.Usuario.Cedula == cedula)
                .ToList();

            if (reservas == null || reservas.Count == 0)
            {
                return NotFound($"No se encontraron reservas para el usuario con ID: {cedula}");
            }

            return Ok(reservas);
        }

        [Authorize]
        [HttpDelete("Eliminar/{id}")]
        public IActionResult Eliminar(int id)
        {
            var reserva = _context.Reservas.FirstOrDefault(x => x.Id == id);

            if (reserva == null)
            {
                return NotFound(new { mensaje = $"No se ha encontrado una reserva con el ID: {id}" });
            }

            try
            {
                _context.Reservas.Remove(reserva);
                _context.SaveChanges();
            }
            catch (Exception ex)
            {
                return StatusCode(500, new { mensaje = "Ocurrió un error al intentar eliminar la reserva.", detalle = ex.Message });
            }

            return Ok(new { mensaje = "Reserva eliminada exitosamente.", reservaEliminada = reserva });
        }

    }
}
