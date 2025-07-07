// Importa los estilos globales.
import "../../index.css";

/**
 * Componente Task
 * 
 * Este componente muestra todas las tareas pendientes de los cursos del usuario de manera rápida y sencilla.
 * 
 */
export function Task() {
  return (
    <div className="mt-32 md:mt-[8em]">
      {/* Mensaje introductorio */}
      <div className="mb-16 flex justify-center items-center ">
        <div className="w-full  md:w-1/2">
          <p className="text-center text-4xl font-bold">
            View all your pending tasks from your courses easily and quickly
          </p>
        </div>
      </div>

      {/* Sección de tareas pendientes */}
      <section className="bg-[#212121] rounded-3xl p-6 md:rounded-[5rem] md:p-20 grid gap-8 mx-4 md:grid-cols-[1fr_2fr] md:gap-[4rem] md:mx-[4vw]">
        {/* Bloque de información de tareas */}
        <div className="mb-8 md:mb-0">
          <h2 className="text-lg mb-2 text-white font-bold md:">Pending jobs</h2>
          <p className="text-xxl mb-4 text-white font-normal">Hello (usuario)</p>
          <h3 className="text-lg text-white mb-4">
            This week you have <br />
            <span className="text-xxl font-semibold">10 tasks</span>
          </h3>
          <button className="flex py-2 px-6 bg-[#6BDD8F] text-white text-md items-center rounded-lg mt-4 md:py-4 md:px-12 md:mt-[10vw] md:mb-[1.5rem]">
            View all ~
          </button>
        </div>

        {/* Lista de tareas pendientes */}
        <div className="flex flex-col gap-4 md:flex-row md:gap-[2vw]">
          {/* Tarea 1 */}
          <div className="bg-[#F0EC84] p-4 rounded-2xl md:p-[3vw] md:rounded-[3rem] grid">
            <p className="font-bold text-md mb-2 md:mb-[2rem]">01</p>
            <p className="text-lg font-normal mb-2 md:w-[8vw] md:mr-[3vw]">
              Algorithm Design and Analysis Assignment
            </p>
            <p className="font-semibold mb-4 md:mb-[5vw]">Interactivas II</p>
            <p className="text-[#2c2c2c] font-semibold text-md">April 9 | 1:00pm</p>
          </div>

          {/* Tarea 2 */}
          <div className="bg-[#8D84F0] p-4 rounded-2xl md:p-[3vw] md:rounded-[3rem] grid">
            <p className="font-bold text-md mb-2 md:mb-[2vw]">02</p>
            <p className="text-lg font-normal mb-2 md:w-[8vw] md:mr-[3vw]">Storyboard Creation</p>
            <p className="font-semibold mb-4 md:mb-[5vw]">Audio and Video Editing</p>
            <p className="text-[#2c2c2c] font-semibold text-md">April 11 | 1:00pm</p>
          </div>

          {/* Tarea 3 */}
          <div className="bg-[#F0B284] p-4 rounded-2xl md:p-[3vw] md:rounded-[3rem] grid">
            <p className="font-bold text-md mb-2 md:mb-[2vw]">03</p>
            <p className="text-lg font-normal mb-2 md:w-[8vw] md:mr-[3vw]">Concept Mapping from Videos</p>
            <p className="font-semibold mb-4 md:mb-[5vw]">Engineering of Interactive Applications</p>
            <p className="text-[#2c2c2c] font-semibold text-md">April 11 | 1:00pm</p>
          </div>
        </div>
      </section>
    </div>
  );
}