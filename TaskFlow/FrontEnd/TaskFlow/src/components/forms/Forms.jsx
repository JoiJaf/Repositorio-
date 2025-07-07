// Importa el hook useState desde React para manejar el estado del componente
import { useState } from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
import { SignInForm } from './SignInForm';
import { LoginForm } from './LoginForm';


// Define el componente funcional Forms
export function Forms() {
    // Usa el hook useState para manejar el estado de showLoginForm
    const [showLoginForm, setShowLoginForm] = useState(true);

    // Función para alternar entre el formulario de login y el de registro
    const toggleForm = () => {
        setShowLoginForm(!showLoginForm);
    };

    return (
        // Contenedor principal con estilos para centrar el contenido
        <section className='flex flex-col items-center justify-center my-14 form-mt-8'>
            <div className='bg-white rounded-lg border border-[#979797] px-20 py-8 w-full sm:max-w-md md:max-w-lg lg:max-w-xl mx-auto'>
                {/* Título del formulario, cambia según el estado de showLoginForm */}
                <h1 className='clamp-xxl text-center '>{showLoginForm ? 'Login' : 'Sign in'}</h1>
                {/* Renderiza el formulario de login o el de registro según el estado */}
                {showLoginForm ? (
                    <LoginForm />
                ) : (
                    <SignInForm />
                )}
                {/* Texto para alternar entre los formularios */}
                <p className='mt-8 mb-10 text-center'>
                    {showLoginForm ? "Don't have an account?" : "Already have an account?"}{" "}
                    <button className='text-[#6BDD8F] hover:text-green-600' onClick={toggleForm}>
                        {showLoginForm ? "Sign in" : "Login"}
                    </button>
                </p>
            </div>
        </section>
    );
}