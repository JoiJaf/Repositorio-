// Importa el archivo CSS personalizado
import "../../index.css";

/*
* Función del componente HealthCondition:
* Este componente representa un formulario de información de salud que muestra campos como edad, horas de sueño, activiadades fisicas y enfermedades.
* Utiliza el componente InputField para renderizar los campos de entrada.
*/

// Función para mostrar el formulario de información de salud
function HealthInfoInput({ label, id, type, name, value }) {
  return (
    <div className="grid my-14">
      <label htmlFor={id} className="clamp-md mb-1">{label}</label>
      <input id={id} type={type} name={name} value={value} className="form-input w-full h-[85px] rounded-[20px] text-black clamp-lg p-4 border-[#EEEEEE] border-2" />
    </div>
  );
}

// Define el componente funcional HealthCondition
export function HealthCondition() {
  return (
    // Contenedor principal del formulario de información de salud
    <div className="bg-[#212121] mt-[2.375rem] p-[2.375rem] rounded-[1.25rem]">
      <h3 className="clamp-xl font-medium text-[#6BDD8F]">Health Condition</h3>
      <div className="grid grid-cols-2 gap-8 text-white max-md:grid-cols-1">
        {/* Contenedor para los campos de entrada para la edad y las horas de sueño */} 
        <div>
          <HealthInfoInput label="Age" id="age" type="text" name="age" value="20 years old" />
          <HealthInfoInput label="Daily sleep hours" id="sleepHours" type="text" name="sleepHours" value="8 hours" />
        </div>
        {/* Contenedor para los campos de entrada para las actividades físicas y las enfermedades */} 
        <div>
          <HealthInfoInput label="Physical activities" id="physicalActivities" type="physicalActivities" name="physicalActivities" value="Joggin, calisthenics" />
          <HealthInfoInput label="Desease(s)" id="desease" type="desease" name="desease" value="Chlamydia, E. Coli" />
        </div>
      </div>
      {/* Contenedor del botón de envío del formulario */}
      <div className="flex justify-center items-center p-4 max-md:px-0">
        <input type="submit" value="Update Condition" className="bg-[#6BDD8F] clamp-lg text-white py-4 px-4 rounded-[1.25rem] w-[37.375rem] max-md:w-full" />
      </div>
    </div>
  );
}
