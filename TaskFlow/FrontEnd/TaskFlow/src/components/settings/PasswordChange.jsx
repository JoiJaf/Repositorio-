// Importa la dependencia de react
import React from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";

// Función para mostrar las reglas de seguridad para el cambio de contraseña
function Guidelines() {
    return (
        // Componente con estilos para el titulo, subtitulo y descripción de las reglas para el cambio de contraseña
        <div className='space-y-4'>
            <h3 className="clamp-xl text-[#6BDD8F] font-medium">Change the password</h3>
            <h4 className="clamp-md mb-2">Password Guidelines:</h4>
            <ul className="list-disc pl-4">
                <li>Use a mix of uppercase, lowercase, numbers, and special characters.</li>
                <li>Ensure your password is at least 8 characters long.</li>
            </ul>
        </div>
    );
}

// Función para mostrar el formulario para cambiar la contraseña
function PasswordForm() {
    return (
        <form method="post" action="#">
            <div className="grid grid-cols-2 p-8 max-md:grid-cols-1">
                {/* Contenedor para el campo de entrada para la contraseña */}
                <div className="flex my-14">
                    <label htmlFor="password" className="mb-1 clamp-md"></label>
                    <input id="password" type="password" name="password" placeholder="New Password" className="form-input w-full h-[3.5rem] rounded-[1.25rem] text-black clamp-lg p-4" />
                </div>
                {/* Contenedor del botón de envío del formulario */}
                <div className="flex justify-end max-md:justify-center items-center p-4">
                    <input type="submit" value="Accept" className="bg-[#6BDD8F] clamp-lg text-white py-4 px-4 rounded-[1.25rem] w-[11.875rem]" />
                </div>

            </div>
        </form>
    );
}

// Define el componente para realizar el cambio de contraseña en la página de configuración
export function PasswordChange() {
    return (
        // Componente principal con estilos para la sección de cambio de contraseña
        <div className="bg-[#212121] w-full h-[17rem] max-md:h-[37.5rem] rounded-[2.5rem]">
            {/* Renderiza los componentes Guidelines y PasswordForm*/}
            <div className="grid grid-cols-2 p-8 max-md:grid-cols-1">
                <Guidelines />
                <PasswordForm />
            </div>
        </div>
    );
}
