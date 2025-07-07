// Importa los estilos globales y los componentes necesarios.
import "../../index.css";
import { EventCategorySelector } from "./SelectCategories";
import { CalendarDatePicker } from "./CalendarDatePicker";
import { Timeset } from "./Timeset";
import { EventDescription } from "./EventDescription";

/**
 * Componente AddEvent
 * 
 * Este componente representa un formulario para agregar un nuevo evento. Incluye la selección de categoría,
 * selección de fecha, configuración de hora, descripción del evento, y otras opciones.
 * 
 */
export function AddEvent() {
  return (
    <form className="w-full max-w-[30rem] mt-[6rem] rounded-lg border border-[#979797] mb-[3rem] mx-auto px-4 sm:px-8">
      {/* Botón de cierre */}
      <div className="mt-[1.5rem] text-end pr-8">
        <button className="" href="x">
          <svg width="1rem" height="1rem" viewBox="0 0 100 100">
            <line
              x1="0"
              y1="0"
              x2="100"
              y2="100"
              stroke="black"
              strokeWidth="10"
            />
            <line
              x1="0"
              y1="100"
              x2="100"
              y2="0"
              stroke="black"
              strokeWidth="10"
            />
          </svg>
        </button>
      </div>

      {/* Título del formulario */}
      <div className="text-center">
        <h1 className="text-[2rem] md:text-[2.5rem] text-center text-black py-[1rem]">
          New Event
        </h1>
      </div>

      {/* Selector de categoría del evento */}
      <div className="mt-4 px-4 md:px-0">
        <EventCategorySelector />
      </div>

      {/* Campo para agregar una palabra clave */}
      <div className="mt-[1rem] px-4 md:px-0">
        <input
          className="text-[1.25rem] md:text-[1.5rem] border-b-2 border-black w-full md:w-[24.5rem] pl-[1rem]"
          id="Key Word"
          type="text"
          name="Add Key Word"
          placeholder="Add Key Word"
        />
      </div>

      {/* Selector de fecha del calendario */}
      <div className="mt-5 px-4 md:px-0">
        <CalendarDatePicker />
      </div>

      {/* Configuración de la hora */}
      <div className="mt-5 px-4 md:px-0">
        <Timeset />
      </div>

      {/* Botón para agregar una imagen */}
      <div className="mt-5">
        <button className="flex " href=" Add Image">
          Add Image
          <svg
            className="bg-black ml-2"
            width="20"
            height="20"
            viewBox="0 0 100 100"
          >
            <line
              x1="20"
              y1="50"
              x2="80"
              y2="50"
              stroke="white"
              stroke-width="10"
            />
            <line
              x1="50"
              y1="20"
              x2="50"
              y2="80"
              stroke="white"
              stroke-width="10"
            />
          </svg>
        </button>
      </div>

      {/* Campo para agregar el porcentaje de la tarea */}
      <div className="mt-[1rem] px-4 md:px-0">
        <input
          className="text-[1.25rem] md:text-[1.5rem] border-b-2 border-black w-full md:w-[24.5rem] pl-[1rem]"
          id="Homework Percentage"
          type="text"
          name="Add Homework Percentage"
          placeholder="Add Homework Percentage"
        />
      </div>

      {/* Descripción del evento */}
      <div className="mt-4 mb-6 px-4 md:px-0">
        <EventDescription />
      </div>

      {/* Botón para agregar el evento */}
      <div className="mb-[2rem] text-center">
        <button
          className="bg-[#0E0E0E] hover:bg-[#6BDD8F] text-[1.5rem] md:text-[2rem] text-white px-6 md:px-[3rem] py-2 md:py-[.6rem] rounded-lg"
          href="Add Event"
        >
          Add Event
        </button>
      </div>
    </form>
  );
}