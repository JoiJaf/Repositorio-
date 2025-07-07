// Importa los estilos globales y la imagen del curso.
import "../../index.css";
import imageCourse from "../../assets/img/InformationCourse.svg";
import { useFetchCourse } from "../../components/hooks/useFetchCourse";

/**
 * Componente InformationCourse
 * 
 * Este componente renderiza una sección de información sobre un curso específico de diseño 3D.
 * Incluye detalles como el nombre del curso, el modo, el aula, el profesor, el horario de clases
 * y una breve descripción del curso. Además, proporciona un enlace para ver las tareas relacionadas con el curso.
 * 
 */
export function InformationCourse() {


  const { course, isLoading } = useFetchCourse();
  //console.log(course);

  const createData = (course) => {
    console.log(course);
    return (
      <section className="py-12 bg-[#FCF8EC]  bg-cover">
        <div className="border-4 border-white rounded-md max-w-[92rem] mx-auto bg-white">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 px-5 py-8">
            {/* Contenedor para la imagen del curso */}
            <div className="flex justify-center lg:justify-start">
              <img className="w-full max-w-xs lg:max-w-xl lg:mx-auto " src={imageCourse} alt="Course" />
            </div>
            {/* Contenedor para la información detallada del curso */}
            <div>
              <h2 className="text-xl pb-2 font-bold">Course Name</h2>
              <h3 className="text-xl pb-2 font-bold">TM5300- English Reading for Computer Science</h3>
              <h3 className="text-xl pb-2 font-bold">Mode: Presential</h3>
              <h3 className="text-xl pb-2 font-bold">Classroom: N01</h3>
              <h3 className="text-xl pb-2 font-bold">Professor: Jorge Miranda Loria</h3>
              <h3 className="text-xl pb-2 font-bold">Class time: M 13-16/ Thu 13-16</h3>
              <h3 className="text-xl pb-2 font-bold">Description</h3>
              <p className="text-md pb-2">
                It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem
                Ipsum is that it has a more-or-less normal distribution of letters, as
                opposed to using 'Content here, content here', making it look like readable
                English.
              </p>
            </div>
          </div>
          {/* Botón para ver las tareas del curso */}
          <div className="mb-8 text-center">
            <a
              className="bg-[#6BDD8F] hover:bg-[#0E0E0E] text-lg lg:text-2xl text-white px-6 lg:px-12 py-2 lg:py-2 rounded-lg"
              href="/schedulePage"
            >
              View Tasks
            </a>
          </div>
        </div>
      </section>
    )
  }

  return (
    <>
      {isLoading ? <p>Loading...</p> : createData(course)}
    </>
  );
}