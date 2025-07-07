// Importa la dependencia de react
import React from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa el componente RoundToggleButton
import RoundToggleButton from './ToggleButton';

// Define el componente funcional Notification
export function Notification() {
    return (
        // Contenedor principal para la sección de notificaciones
        <div className="bg-[#212121] w-full h-[11rem] max-md:h-[15.625rem] rounded-[2.5rem]">
            <div className="grid grid-cols-2 p-8 max-md:flex">
                {/* Contenedor con estilos para el titulo de notificaciones y descripción */}
                <div className='space-y-4'>
                    <h3 className="clamp-xl text-[#6BDD8F] font-medium">Notification</h3>
                    <p className="clamp-md max-md:text-[1rem]">With this option you can activate and deactivate pop-up notifications</p>
                </div>
                {/* Contenedor con estilos para centrar el botón */}
                <div className="flex justify-end p-8 max-md:justify-center max-md:items-end"><RoundToggleButton /></div>
            </div>
        </div>
    );
}