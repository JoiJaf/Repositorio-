// Importa los componentes de barras de progreso circular y los estilos correspondientes.
import {
  CircularProgressbar,
  CircularProgressbarWithChildren,
} from "react-circular-progressbar";
import "react-circular-progressbar/dist/styles.css";

// Importa los estilos globales.
import "../../index.css";

/**
 * Componente Stadistics
 *
 * Este componente muestra estadísticas relacionadas con las tareas, incluyendo el número de tareas sin completar,
 * el progreso semanal de tareas completadas y una barra de progreso circular que representa el progreso general.
 *
 */
export function Stadistics() {
  
  // Valor del progreso (porcentaje)
  var progress = 70;
  const value = progress;

  return (
    <section className="bg-[#212121] pt-8 pb-16 md:pt-[2rem] md:pb-[4rem]">
      {/* Mensaje introductorio */}
      <div className="mb-16 flex justify-center items-center ">
        <div className="w-full  md:w-1/2">
          <p className="text-center text-white md:text-3xl text-4xl font-bold">
            Monitor the number of tasks you have and stay alert about your
            progress with the traffic light indicator.
          </p>
        </div>
      </div>

      {/* Título de las estadísticas */}
      <h2 className="text-xl text-center font-bold text-[#6BDD8F] pb-4 md:pb-[1rem]">
        Stadistics
      </h2>

      {/* Sección de estadísticas */}
      <div className="flex flex-col gap-8 justify-center items-center md:flex-row md:gap-[1vw]">
        {/* Bloques de estadísticas */}
        <div className="flex flex-col gap-8 md:flex-row md:gap-[3rem]">
          {/* Tareas sin completar */}
          <div className="grid border-solid border-2 border-[#E0E0E0] w-[80vw] md:w-[15vw] p-8 md:p-[2rem] rounded-3xl bg-white">
            <p className="text-xxl font-semibold">8</p>
            <hr className="bg-[#6BDD8F] h-2 w-8 mb-8 md:mb-[2vw]" />
            <p className="text-lg font-light pb-8 md:pb-[3rem] text-[#979797]">
              Uncompleted tasks
            </p>
          </div>

          {/* Progreso semanal de tareas */}
          <div className="grid border-solid border-2 border-[#E0E0E0] w-[80vw] md:w-[40vw] p-6 md:p-[2vw] rounded-3xl bg-white">
            <div className="flex flex-col gap-4 md:flex-row md:justify-between">
              <p className="text-[#979797] text-lg font-light w-full md:w-[15vw] pt-4 md:pt-[1vw]">
                So far, you've completed tasks this week
              </p>
              <div className="flex items-center justify-between md:justify-start">
                <p className="text-xxl font-semibold pt-4 pr-4 md:pr-8 md:pt-[1vw]">
                  2/10
                </p>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  className="icon icon-tabler icon-tabler-info-circle"
                  width="40"
                  height="40"
                  viewBox="0 0 24 24"
                  strokeWidth="1"
                  stroke="#2c3e50"
                  fill="none"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                  <path d="M12 9h.01" />
                  <path d="M11 12h1v4h1" />
                </svg>
              </div>
            </div>
            {/* Indicador de progreso */}
            <div>
              <div className="w-full bg-zinc-200 dark:bg-zinc-700 rounded-full h-4">
                <div className="h-4 w-4 bg-red-500 rounded-full animate-full"></div>
              </div>
            </div>
          </div>

          {/* Barra de progreso circular */}
          <div className="w-[40vw] md:w-[15vw] z-0">
            <CircularProgressbarWithChildren value={value}>
              <div style={{ fontSize: 12 }}>
                <strong className="text-xxl font-bold text-[#fff]">
                  {progress}%
                </strong>
              </div>
            </CircularProgressbarWithChildren>
          </div>
        </div>
      </div>
    </section>
  );
}
