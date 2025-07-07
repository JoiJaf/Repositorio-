// Importa el archivo CSS principal
import "../../index.css";

/*
* Función del componente PersonalInformation:
* Este componente representa un formulario de información personal que muestra campos como carnet, carrera, celular y estado.
* Utiliza el componente InputField para renderizar los campos de entrada.
*/

// Función para mostrar el formulario de información personal 
function InputField({ label, id, name, value, type = "text" }) {
  return (
    <div className="grid my-14">
      <label htmlFor={id} className="clamp-md mb-1">{label}</label>
      <input id={id} type={type} name={name} value={value} className="form-input w-full h-[5.313rem] rounded-[1.25rem] text-black clamp-lg p-4 border-[#EEEEEE] border-2" />
    </div>
  );
}

// Define el componente funcional PersonalInformation
export function PersonalInformation() {
    
    return (
        // Contenedor principal con estilos para el formulario de información personal
        <section className="mb-[2.375rem] mx-[2.375rem]">
          <div className="grid grid-cols-2 gap-8 text-[#A7A7A7] max-md:grid-cols-1">
            {/* Contenedor para los campos de entrada para el carnet y la carrera */} 
            <div>
              <InputField label="Carnet" id="carnet" name="carnet" value="C13838" />
              <InputField label="Career" id="career" name="career" value="ITM" />
            </div>
            {/* Contenedor para los campos de entrada para el celular y el estado */} 
            <div>
              <InputField label="Celphone" id="celphone" name="celphone" value="+506 87978797" />
              <InputField label="Status" id="status" name="status" value="Active" />
            </div>
          </div>
        </section>
      );
   
}
