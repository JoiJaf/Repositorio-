// importa el archivo CSS principal
import "../../index.css";

/**
 * Componentes para renderizar una tarjeta de tarea
 * @param {Object} props
 * @param {string} props.imageUrl - Url de la imagen de la tarea
 * @param {string} props.title - titulo de la tarea
 * @param {string} props.category - categoria de la tarea
 * @param {string} props.estimatedTime - tiempo estimado para completar la tarea
 */
export function TaskCard({ imageUrl, title, category, estimatedTime }) {
    return (
        <div className="border-4 border-[#fff] flex gap-[2vw] items-center mb-[1rem] rounded-[1rem] hover:scale-[0.95] hover:duration-700">
            {/* task image */}
            <img className="md:w-[11vw] w-[25vw] rounded-[1rem_0_0_1rem]" src={imageUrl} alt="imagen" />
            {/* task information */}
            <div className="md:text-[1.2vw] text-[2.2vw]">
                {/* task title */}
                <p className="text-[#fff] font-semibold">{title}</p>
                {/* task category */}
                <p className="text-[#fff] pb-[.8rem]">{category}</p>
                {/* task estimated time */}
                <p className="text-[#fff] font-light">{estimatedTime}</p>
            </div>
        </div>
    );
}


TaskCard.defaultProps = {
  
    imageUrl: '/default-image.png',
    title: 'Tarea',
    category: 'Universidad',
    estimatedTime: '10:00pm'
  
  }
  