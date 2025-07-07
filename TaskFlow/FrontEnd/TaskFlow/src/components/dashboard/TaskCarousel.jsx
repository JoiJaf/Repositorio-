// Importa el archivo CSS principal
import "../../index.css";
// importa el componente Carousel
import { Carousel } from "./Carousel.jsx";
import { useFetchData } from "../hooks/useFetchData";
import Cookies from 'js-cookie';

// Define el componente Task
export function Task() {

    const authData = Cookies.get("auth");
    const objet = JSON.parse(authData);
    const name = objet.user_name;
    const id = objet.id;

    // Utiliza el hook useFetchData para obtener los datos de eventos
    const { data, isLoading } = useFetchData(id);

    // Función para contar la cantidad de eventos
    const countEvents = () => {
        if (data && data.length > 0) {
            return data.length;
        } else {
            return 0;
        }
    };

    // Obtén el número de eventos
    const numberOfTasks = countEvents();

    return (
        <div className="mt-8 md:mt-16">
            {/* contenedor del carrusel y el banner de información */}
            <section className="bg-[#212121] rounded-[5rem] md:p-20 p-[2rem] md:grid md:grid-cols-[1fr_2fr] mx-[4vw] relative">
                {/* Contiene el texto de las tareas pendientes*/}
                <div className="content-end">
                <h2 className="md:text-2xl text-4xl mb-2 text-white font-bold text-center md:text-left">Pending jobs</h2>
                    <p className="md:text-xl text-3xl mb-2 text-white font-normal text-center md:text-left">Hello {name}</p>
                    <h3 className="md:text-base text-xl text-white mb-4 text-center md:text-left">This week you have <br />
                    <span className="md:text-xl text-2xl font-semibold">{numberOfTasks} tasks</span></h3>
                    <div className="flex justify-center md:justify-start">
                        <button className="flex py-3 px-8 md:py-4 md:px-12 mb-4 bg-[#6BDD8F] text-white text-xl md:text-base items-center rounded-lg hover:scale-105 hover:bg-green-700 hover:duration-300">
                            View all
                        </button>
                    </div>
                </div>
                {/* componente Carousel */}
                <Carousel />
            </section>
            {/* texto que sería el subtitulo de la siguiente seccion */}
            <p className="text-3xl font-semibold pt-8 text-center">Calendar and Tasks</p>
        </div>
    )
}
