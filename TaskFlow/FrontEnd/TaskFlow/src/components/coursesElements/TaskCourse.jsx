
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa la librería PropTypes para la validación de tipos de las props
import PropTypes from 'prop-types';

// Define el componente funcional TaskCourse
export function TaskCourse({ title, description, image, date }) {
    return (
        // Contenedor principal con estilos aplicados para el diseño del task
        <div className="bg-white md:p-[2vw] p-[1.4rem] border-2 rounded-[2rem] flex mx-[2vw] justify-between pr-[4rem] hover:scale-[0.98] hover:duration-700 hover:border-[#9d9d9d]">
            {/* Contenedor de imagen y detalles */}
            <div className="flex">
                {/* Imagen de la tarea */}
                <img className="md:w-[12vw] w-[20vw] md:h-[8vw] h-[15vw]" src={image} alt={title} />
                
                {/* Contenedor de detalles de la tarea */}
                <div className="ml-[10vw] md:mr-0  flex flex-col justify-center">
                    {/* Título de la tarea */}
                    <p className="md:text-[1.5rem] text-[1rem] font-semibold m-0">{title}</p>
                    {/* Descripción de la tarea */}
                    <p className="md:text-[1.3rem] text-[.8rem] mb-[1vw] m-0">{description}</p>
                    {/* Fecha de la tarea */}
                    <p className="md:text-[1rem] text-[.6rem] text-[#6E6E6E]">{date}</p>
                </div>
            </div>
            {/* Checkbox para marcar la tarea como completada */}
            <input className="w-[3vw] ml-6" type="checkbox" value="" />
        </div>
    );
}

// Define los tipos de las props y especifica que son requeridas
TaskCourse.propTypes = {
    title: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    image: PropTypes.string.isRequired,
    date: PropTypes.string.isRequired
}

// Define valores por defecto para las props
TaskCourse.defaultProps = {
    title: 'TaskCourse title',
    description: 'TaskCourse description',
    image: 'TaskCourse image',
    date: 'TaskCourse date'
}