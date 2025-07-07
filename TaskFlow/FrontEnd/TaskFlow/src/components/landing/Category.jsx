// Importa las imágenes de las categorías y los estilos globales.
import carrera from "../../assets/img/carre.png";
import uni from "../../assets/img/uni.png";
import course from "../../assets/img/course.png";
import students from "../../assets/img/est.png";
import "../../index.css";

/**
 * Componente Category
 * 
 * Este componente muestra una sección de categorías con imágenes y botones para ver todas las opciones disponibles.
 * Los usuarios pueden utilizar diferentes filtros y opciones para buscar sus tareas de manera más eficiente.
 * 
 */
export function Category() {
  return (
    <div className="bg-[#FCF8EC] pt-8 pb-4 px-5 md:pt-[8vw] md:pb-[4vw] md:px-[10vw]">
      {/* Mensaje introductorio */}
      <div className="mb-16 flex justify-center items-center ">
        <div className="w-full  md:w-1/2">
          <p className="text-center text-4xl font-bold">
            Use the different filters and options to search for your tasks more
            efficiently.
          </p>
        </div>
      </div>

      {/* Cuadrícula de categorías */}
      <div>
        <div className="grid gap-4 grid-cols-1 md:grid-cols-2">
          {/* Categoría: Carreras */}
          <div className="p-4 flex flex-col items-center border-2 rounded-lg bg-white">
            <img src={carrera} alt="Career" className="mb-4" />
            <p className="clamp-lg m-auto text-center">Careers</p>
            <button className="bg-[#212121] py-2 px-6 text-white rounded-lg mt-4">
              View all ~
            </button>
          </div>

          {/* Categoría: Cursos */}
          <div className="p-4 flex flex-col items-center border-2 rounded-lg bg-white">
            <img src={course} alt="Courses" className="mb-4" />
            <p className="clamp-lg m-auto text-center">Courses</p>
            <button className="bg-[#212121] py-2 px-6 text-white rounded-lg mt-4">
              View all ~
            </button>
          </div>

          {/* Categoría: Universidad */}
          <div className="p-4 flex flex-col items-center border-2 rounded-lg bg-white">
            <img src={uni} alt="University" className="mb-4" />
            <p className="clamp-lg m-auto text-center">University</p>
            <button className="bg-[#212121] py-2 px-6 text-white rounded-lg mt-4">
              View all ~
            </button>
          </div>

          {/* Categoría: Estudiantes */}
          <div className="p-4 flex flex-col items-center border-2 rounded-lg bg-white">
            <img src={students} alt="Student" className="mb-4" />
            <p className="clamp-lg m-auto text-center">Student</p>
            <button className="bg-[#212121] py-2 px-6 text-white rounded-lg mt-4">
              View all ~
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}