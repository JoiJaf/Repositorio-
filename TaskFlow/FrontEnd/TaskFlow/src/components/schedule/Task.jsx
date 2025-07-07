// importa el archivo CSS principal
import "../../index.css";
// importa el componente TaskCard
import { TaskCard } from './TaskCard';
/**
 * Componenets para mostrar las tareas
 * @param {Object[]} tasks - Array de las tareas
 * @returns {React.ReactElement} - el componente
 */
export function Tasks({ tasks }) {
    // array para la informacion de las tareas
    const tasksArray = [
        {
            imageUrl: "https://biblioteca.acropolis.org/wp-content/uploads/2019/07/Rosa-Mister_Lincoln.jpg",
            title: "Task that has to be done that day",
            category: "Category",
            estimatedTime: "Estimated time"
        },
        {
            imageUrl: "https://biblioteca.acropolis.org/wp-content/uploads/2019/07/Rosa-Mister_Lincoln.jpg",
            title: "Task that has to be done that day",
            category: "Category",
            estimatedTime: "Estimated time"
        }];

    /**
     * renderiza las tareas
     * @returns {React.ReactElement}
     */
    return (
        // contenedor del componente de las tareas
        <div className="mt-[1vw] mb-[2rem] mr-[4vw] md:ml-0 ml-[4vw] bg-[#212121] p-[2rem] rounded-[2rem] md:w-auto w-[40v]">
            <h3 className="md:text-[1.2vw] text-[#fff] pb-[1rem] font-semibold">Tasks</h3>
            <div className="grid">
                {tasksArray.map((task, index) => (
                    // Renderice cada tarea como un componente de TaskCard
                    <TaskCard
                        key={index}
                        imageUrl={task.imageUrl}
                        title={task.title}
                        category={task.category}
                        estimatedTime={task.estimatedTime}
                    />
                ))}
                {/* Mostrar un mensaje de que no hay tareas para hoy */}
                <p className="text-[#A3A3A3] pt-[.5rem] md:text-[1.4vw]">Nothing more to do today</p>
            </div>
        </div>
    );
}
/**
 * @typedef {Object} Task
 * @property {string} imageUrl - URL of the task image
 * @property {string} title - Title of the task
 * @property {string} category - Category of the task
 * @property {string} estimatedTime - Estimated time to complete the task
 */
/**
 * @typedef {Object[]} TasksArray
 * @property {Task} [] - Array of tasks
 */
/**
 * @typedef {Object} TasksProps
 * @property {TasksArray} tasks - Array of tasks
 */
