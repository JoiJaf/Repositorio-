﻿using System;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

#pragma warning disable CA1814 // Prefer jagged arrays over multidimensional

namespace ApiHotelesBeach.Migrations
{
    /// <inheritdoc />
    public partial class InitialCreate : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "FormasPago",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Nombre = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: false),
                    Numero = table.Column<int>(type: "int", nullable: false),
                    Banco = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: true),
                    CVV = table.Column<string>(type: "nvarchar(max)", nullable: true),
                    FechaExpiracion = table.Column<string>(type: "nvarchar(max)", nullable: true),
                    NombreTitular = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_FormasPago", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Paquetes",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    Nombre = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: false),
                    Costo = table.Column<decimal>(type: "decimal(18,4)", nullable: false),
                    Prima = table.Column<decimal>(type: "decimal(18,4)", nullable: false),
                    Mensualidades = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Paquetes", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Usuarios",
                columns: table => new
                {
                    Cedula = table.Column<string>(type: "nvarchar(20)", maxLength: 20, nullable: false),
                    TipoCedula = table.Column<string>(type: "nvarchar(10)", maxLength: 10, nullable: false),
                    NombreCompleto = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: false),
                    Telefono = table.Column<string>(type: "nvarchar(15)", maxLength: 15, nullable: false),
                    Direccion = table.Column<string>(type: "nvarchar(200)", maxLength: 200, nullable: false),
                    Email = table.Column<string>(type: "nvarchar(max)", nullable: false),
                    Password = table.Column<string>(type: "nvarchar(100)", maxLength: 100, nullable: false),
                    FechaRegistro = table.Column<DateTime>(type: "datetime2", nullable: false),
                    IsAdmin = table.Column<bool>(type: "bit", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Usuarios", x => x.Cedula);
                });

            migrationBuilder.CreateTable(
                name: "Reservas",
                columns: table => new
                {
                    Id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("SqlServer:Identity", "1, 1"),
                    CantidadNoches = table.Column<int>(type: "int", nullable: false),
                    CantidadPersonas = table.Column<int>(type: "int", nullable: false),
                    Descuento = table.Column<decimal>(type: "decimal(18,4)", nullable: false),
                    MontoRebajado = table.Column<decimal>(type: "decimal(18,4)", nullable: false),
                    MontoFinal = table.Column<decimal>(type: "decimal(18,4)", nullable: false),
                    PaqueteId = table.Column<int>(type: "int", nullable: false),
                    FormaPagoId = table.Column<int>(type: "int", nullable: false),
                    ClienteCedula = table.Column<string>(type: "nvarchar(20)", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Reservas", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Reservas_FormasPago_FormaPagoId",
                        column: x => x.FormaPagoId,
                        principalTable: "FormasPago",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                    table.ForeignKey(
                        name: "FK_Reservas_Paquetes_PaqueteId",
                        column: x => x.PaqueteId,
                        principalTable: "Paquetes",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                    table.ForeignKey(
                        name: "FK_Reservas_Usuarios_ClienteCedula",
                        column: x => x.ClienteCedula,
                        principalTable: "Usuarios",
                        principalColumn: "Cedula",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.InsertData(
                table: "FormasPago",
                columns: new[] { "Id", "Banco", "CVV", "FechaExpiracion", "Nombre", "NombreTitular", "Numero" },
                values: new object[,]
                {
                    { 1, null, null, null, "Efectivo", null, 0 },
                    { 2, "Banco Nacional", "123", "12/25", "Tarjeta de Crédito", "Juan Pérez", 1010101 }
                });

            migrationBuilder.InsertData(
                table: "Usuarios",
                columns: new[] { "Cedula", "Direccion", "Email", "FechaRegistro", "IsAdmin", "NombreCompleto", "Password", "Telefono", "TipoCedula" },
                values: new object[] { "604880492", "Esparza Centro", "ashleycr33@gmail.com", new DateTime(2024, 11, 18, 15, 45, 44, 47, DateTimeKind.Local).AddTicks(660), true, "Ashley Rojas Pérez", "ashley12345", "85272939", "FISICA" });

            migrationBuilder.CreateIndex(
                name: "IX_Reservas_ClienteCedula",
                table: "Reservas",
                column: "ClienteCedula");

            migrationBuilder.CreateIndex(
                name: "IX_Reservas_FormaPagoId",
                table: "Reservas",
                column: "FormaPagoId");

            migrationBuilder.CreateIndex(
                name: "IX_Reservas_PaqueteId",
                table: "Reservas",
                column: "PaqueteId");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Reservas");

            migrationBuilder.DropTable(
                name: "FormasPago");

            migrationBuilder.DropTable(
                name: "Paquetes");

            migrationBuilder.DropTable(
                name: "Usuarios");
        }
    }
}
