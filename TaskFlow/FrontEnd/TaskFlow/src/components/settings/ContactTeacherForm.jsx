// Importa la dependencia de react
import React from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";

// Función para mostrar el formulario de contacto
function ContactForm() {
    return (
        <form method="post" action="#">
            {/* Contenedor para el campo de entrada para el email */}
            <div className="flex mb-5">
                <label htmlFor="email" className="mb-1 clamp-md"></label>
                <input id="email" type="text" name="email" placeholder="Teacher´s email" className="form-input w-full h-[4.938rem] rounded-[1.25rem] text-black clamp-lg p-4 border-[#EEEEEE] border-2"/>
            </div>

            {/* Contenedor para el campo de entrada para el asunto */}
            <div className="flex my-5">
                <label htmlFor="matter" className="mb-1 clamp-md"></label>
                <input id="matter" type="matter" name="matter" placeholder="Matter" className="form-input w-full h-[4.938rem] rounded-[1.25rem] text-black clamp-lg p-4 border-[#EEEEEE] border-2"/>
            </div>

            {/* Contenedor para el campo de entrada para el texto */}
            <div className="flex mb-14 items-start">
                <label htmlFor="message" className="mb-1 clamp-md"></label>
                <textarea id="message" type="text" name="message" placeholder="Message for the teacher" className="form-input w-full h-[16rem] rounded-[2.5rem] text-black clamp-lg p-4 border-[#EEEEEE] border-2 items-left"/>
            </div>

            {/* Contenedor del botón de envío del formulario */}
            <div className="flex justify-end max-md:justify-center items-center p-4 mb-[7.125rem]">
                <input type="submit" value="Send" className="bg-[#323233] clamp-lg text-white py-4 px-4 rounded-[1.25rem] w-[11.875rem]" />
            </div>
        </form>
    );
}

// Define el componente funcional ContactTeacherForm
export function ContactTeacherForm() {
    return (
        // Contenedor principal con estilos para el sistema de contacto con el profesor
        <div className='w-full bg-[#FCF8EC]'>
            <h2 className="my-[2.375rem] ml-[1.875rem] clamp-xxl font-bold pt-[2.375rem]">Contact with the teacher</h2>
                <div className='grid grid-cols-2 gap-[2.375rem] max-md:grid-cols-1'>
                    {/* Componente con la imagen de referencia del sistema de contacto con el profesor */}
                    <div className='mx-[2.375rem]'>
                        <img className='w-full h-auto' src="../src/assets/img/contactTeacher.png" alt="contact with the teacher" />
                    </div>
                    {/* Renderiza el componente ContactForm */}
                    <div className='mx-[2.375rem]'>
                        <ContactForm />
                    </div>
                </div>                                                     
        </div>
    );
}