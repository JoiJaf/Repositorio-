// importa el modulo de react y el hook useRef
import React, { useRef } from 'react';
// importacion del componente de las tarjetas de tareas
import { TaskCard } from './TaskCard.jsx';
// importa la informacion de ejemplo que estará en las tarjetas
//import { tasks } from './DataTasks.jsx';
import { useFetchData } from "../hooks/useFetchData";
import Cookies from 'js-cookie';

// crea la funcion del carrusel 
export function Carousel() {
    // la variable para hacer el llamado del componente useRef
    const scrollRef = useRef();
    // funcion que le da direccion al carrusel 
    const handleScroll = (direction) => {
        const container = scrollRef.current;
        const scrollAmount = 200;
        if (direction === 'left') {
            container.scrollLeft -= scrollAmount;
        } else {
            container.scrollLeft += scrollAmount;
        }
    };

    const authData = Cookies.get("auth");
    const objet = JSON.parse(authData);
    const id = objet.id;
    const { data, isLoading } = useFetchData(id);

    // Arreglo de colores
    const colors = [
        "#F0EC84", // bg-[#F0EC84]
        "#8D84F0", // bg-[#8D84F0]
        "#F0B284", // bg-[#F0B284]
    ];

    // Asignar colores basado en el índice
    const assignColor = (index) => {
        const colorIndex = index % colors.length;
        return `bg-[${colors[colorIndex]}]`;
    };

    return (
        // contenedor de las tarjetas que estarán en el carrusel 
        <div className="flex overflow-y-hidden p-[2rem] gap-[2vw] cursor-pointer overflow-x-hidden w-full" ref={scrollRef}>
            {/* bucle que crea las tarjetas*/}
            {data.map((task, index) => (
                <TaskCard
                    key={task.id}
                    bgColor={assignColor(index)}
                    number={task.number}
                    title={task.title}
                    course={task.course}
                    dueDate={task.finish_date}
                />
            ))}
            {/* boton para mover el carrusel hacia la izquierda */}
            <button
                className="absolute top-1/2 transform -translate-y-1/2 left-100 bg-white bg-opacity-25 hover:bg-opacity-85 rounded-full p-4"
                onClick={() => handleScroll('left')}
            >
                &lt;
            </button>
            {/* boton para mover el carrusel hacia la derecha */}
            <button
                className="absolute top-1/2 transform -translate-y-1/2 right-20 bg-white bg-opacity-25 hover:bg-opacity-85 rounded-full p-4"
                onClick={() => handleScroll('right')}
            >
                &gt;
            </button>
        </div>
    );
}


