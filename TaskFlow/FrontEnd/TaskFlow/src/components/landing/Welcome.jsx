// Importa la imagen del logo del proyecto y los estilos globales.
import nombrelogo from "../../assets/img/logo-proyecto-blanco.svg";
import "../../index.css";

// Importa los componentes utilizados en la sección de bienvenida.
import { Task } from "../landing/TaskCarousel.jsx";
import { Stadistics } from "../landing/Stadistics.jsx";
import { CreateAccount } from "../landing/CreateAccount.jsx";
import { Category } from "../landing/Category.jsx";

/**
 * Componente Welcome
 * 
 * Este componente representa la sección de bienvenida de la página de inicio.
 * Incluye un saludo, el logo del proyecto, un botón para comenzar y varias secciones 
 * que muestran diferentes componentes como tareas, estadísticas, categorías y la opción de crear una cuenta.
 * 

 */
export function Welcome() {
  return (
    <section>
      {/* Sección principal con fondo y contenido centrado */}
      <div className="grid bg-[url('assets/img/landing.jpg')] mb-40 md:mb-[10rem]">
        <div className="mt-32 text-center mb-32 md:mt-[20rem] md:mb-[15rem]">
          {/* Título de bienvenida */}
          <h1 className="text-2xl mb-8 text-white md:text-3xl md:mb-[2rem]">
            Welcome to
          </h1>
          {/* Contenedor para el logo del proyecto */}
          <div className="mb-8 grid justify-center md:mb-[2rem]">
            <img
              className="w-64 md:w-[25rem]"
              src={nombrelogo}
              alt="nombrelogo"
            />
          </div>
          {/* Botón para comenzar, redirecciona a crear cuenta */}
          <a
            className="text-xl text-white border-2 border-[#6BDD8F] bg-[#6BDD8F] px-8 py-4 rounded-xl w-48 text-center md:text-3xl md:py-1 md:w-[13rem]"
            href="/formsPage"
          >
            Start
          </a>
        </div>
      </div>
      {/* Sección para mostrar las tareas */}
      <div className="mb-[8rem]">
        <Task />
      </div>
      {/* Sección para mostrar las estadísticas */}
      <div>
        <Stadistics />
      </div>
      {/* Sección para mostrar las categorías */}
      <div>
        <Category />
      </div>
      {/* Sección para crear una cuenta */}
      <div>
        <CreateAccount />
      </div>
    </section>
  );
}
