// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa PropTypes para validar las props del componente
import PropTypes from 'prop-types';

// Define el componente funcional Course
export function Course({ name, description, image }) {
    return (
        // Sección principal con estilos para el contenedor del curso
        <section className="bg-white rounded-lg border border-[#E0E0E0] w-full sm:max-w-md md:max-w-lg lg:max-w-xl mx-auto gap-4 mt-4 ">
            {/* Contenedor de la imagen del curso */}
            <div>
                <img className="w-full h-full rounded-t-lg" src={image} alt="#" />
            </div>
            {/* Contenedor de los detalles del curso */}
            <div className="p-8">
                <div>
                    {/* Título del curso */}
                    <h2 className="clamp-xl font-bold mt-4 mb-4">{name}</h2>
                </div>
                <div className="mt-6">
                    {/* Subtítulo y descripción del curso */}
                    <h3 className="clamp-md font-bold">Description</h3>
                    <p className="clamp-md line-clamp-3">{description}</p>
                </div>
                {/*  Boton para ver más detalles del curso */}
                <div className="flex items-center justify-center my-6">

                    <a href='/informationCoursePage' className="text-center bg-[#6BDD8F] hover:bg-green-600 text-white py-4 px-4 rounded-2xl w-full">View More</a>

                </div>
            </div>
        </section>
    );
}

// Define los tipos de las props que el componente Course espera recibir
Course.propTypes = {
    name: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    image: PropTypes.string.isRequired,
};

// Define valores por defecto para las props del componente Course
Course.defaultProps = {
    name: 'Course name',
    description: 'Course description',
    image: 'https://images.squarespace-cdn.com/content/v1/60794dbc8615125d3ad57026/adf94af6-7aab-4503-9569-527b9faec977/react1logo.png',
};