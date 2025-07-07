
// Importa el archivo CSS principal para estilos globales
import "../../index.css";

// Importa el componente TaskCourse desde el archivo especificado
import { TaskCourse } from "./TaskCourse";

// Define el componente funcional TaskCourseContainer
export function TaskCourseContainer({ items }) {

    return (
        // Fragmento JSX vacío para envolver el contenido
        <>
            {/* Sección principal que contiene una columna flexible con espacio entre elementos */}
            <section className="flex flex-col space-y-2">
                {/* Mapea a través del array de items y renderiza un componente TaskCourse para cada uno */}
                {items.map(item => (
                    <TaskCourse
                        key={item.id} // Clave única para cada elemento, necesaria para listas en React
                        title={item.title}
                        description={item.description}
                        date={item.date}
                        image={item.image}
                    />
                ))}
            </section>
        </>
    );
}