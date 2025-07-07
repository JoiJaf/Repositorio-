
// Importa la imagen de tarea desde la ruta especificada
import taskImg from '../../assets/img/task-image.png';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa el componente TaskCourseContainer desde el archivo especificado
import { TaskCourseContainer } from "./TaskCourseContainer";
// Importa componentes de la librería react-circular-progressbar para mostrar barras de progreso circulares
import { CircularProgressbar, CircularProgressbarWithChildren } from 'react-circular-progressbar';
// Importa los estilos CSS para las barras de progreso circulares
import 'react-circular-progressbar/dist/styles.css';

// Define el componente funcional CoursesElements
export function CoursesElements() {
    // Define una variable para el progreso, en este caso, 70%
    var progress = 70;
    // Define una constante 'value' igual al progreso
    const value = progress;

    // Ejemplo de uso del componente CircularProgressbar
    <CircularProgressbar value={value} maxValue={1} text={`${value * 100}%`} styles={{}} />;

    // Array de tareas con información sobre cada tarea (id, imagen, título, descripción, fecha)
    const tasks = [
        { 
            "id": 1, 
            "image": "https://edifica.com.pe/blog/wp-content/uploads/2022/09/que-es-edificio-inteligente.jpg",
            "title": "Task title", 
            "description": "Task description", 
            "date": "Time"  
        },
        { 
            "id": 2, 
            "image": "https://edifica.com.pe/blog/wp-content/uploads/2022/09/que-es-edificio-inteligente.jpg",
            "title": "Task title", 
            "description": "Task description", 
            "date": "Time"  
        },
        { 
            "id": 3, 
            "image": "https://biblioteca.acropolis.org/wp-content/uploads/2019/07/Rosa-Mister_Lincoln.jpg",
            "title": "UI/UX", 
            "description": "Title", 
            "date": "Time"  
        },
        { 
            "id": 4, 
            "image": "https://biblioteca.acropolis.org/wp-content/uploads/2019/07/Rosa-Mister_Lincoln.jpg",
            "title": "UI/UX", 
            "description": "Title", 
            "date": "Time"  
        },
        { 
            "id": 5, 
            "image": "https://biblioteca.acropolis.org/wp-content/uploads/2019/07/Rosa-Mister_Lincoln.jpg",
            "title": "UI/UX", 
            "description": "Title", 
            "date": "Time"  
        },
        // Otros eventos...
    ];

    // Renderiza el JSX del componente CoursesElements
    return (
        // Sección principal con márgenes superiores e inferiores
        <section className="mt-8 mb-40">
            {/* Título del curso */}
            <h1 className="clamp-xxl font-bold px-8">TM5300- English Reading for Computer Science</h1>
            {/* Contenedor principal dividido en dos columnas */}
            <div className="mt-4 grid grid-cols-[35%_60%] justify-center mb-10 px-4 py-4 gap-6 form-grid-cols-2 form-mt-8">
                {/* Primera columna: sección de estadísticas */}
                <section className="gap-15 border border-[#E0E0E0] rounded-[1rem] bg-[#0E0E0E] flex flex-col">
                    {/* Título de la sección de estadísticas */}
                    <div className="flex justify-start pl-4">
                        <h1 className="clamp-xl text-[#6BDD8F] font-bold">Statistics</h1>
                    </div>
                    {/* Contenido de la sección de estadísticas */}
                    <div className="grid p-[1rem] ">
                        <section className="mt-6">
                            <div>
                                {/* Descripción de la sección de progreso */}
                                <p className="text-[#CCCCCC] clamp-md">This section displays your progress in this course, including the number of tasks
                                    completed and the percentage completed.<br />tasks this week</p>
                            </div>
                            {/* Progreso de tareas completadas */}
                            <div className="flex justify-center mt-7">
                                <h2 className="clamp-xxl font-bold text-[#CCCCCC]">2/10</h2>
                            </div>
                        </section>
                        {/* Barra de progreso circular */}
                        <div className="flex justify-center mt-20">
                            <div className='md:w-[15vw] w-[10rem] z-0 m-auto'>
                                <CircularProgressbarWithChildren value={value}>
                                    <div style={{textAlign: 'center'}}>
                                        {/* Texto dentro de la barra de progreso */}
                                        <strong className='md:text-[2vw] font-bold text-[#fff]'>{progress}%</strong>
                                        <p className='md:text-[1.2vw] font-bold text-[#fff]'>Your week <br /> porcentage</p>
                                    </div>
                                </CircularProgressbarWithChildren>
                            </div>
                        </div>
                    </div>
                </section>
                {/* Segunda columna: sección de tareas */}
                <section className="bg-[#FCF8EC] gap-15 border border-[#E0E0E0] rounded-[1rem] overflow-y-auto max-h-[650px] flex flex-col">
                    {/* Título de la sección de tareas */}
                    <div className="flex justify-start pl-4 mt-4">
                        <h1 className="clamp-xl font-bold text-[#0E0E0E]">All the tasks</h1>
                    </div>
                    {/* Contenedor de la lista de tareas */}
                    <div className="grid p-[1rem] flex-1">
                        {/* Componente TaskCourseContainer que recibe la lista de tareas */}
                        <TaskCourseContainer items={tasks} />
                    </div>
                </section>
            </div>
        </section>
    );
}