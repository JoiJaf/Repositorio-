// Importa el hook useState desde React para manejar el estado del componente
import { useState } from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa los componentes SignInForm
import axios from 'axios';
// Importa el hook useNavigate
import { useNavigate } from "react-router-dom";
//Importar Cookies
import Cookies from 'js-cookie';

// Define el componente funcional SignInForm
export function SignInForm() {

    //Para redireccionar al usuario a la página de inicio (Home)
    const navigate = useNavigate();

    // Define un estado para el formulario de inicio de sesión y los datos del usuario
    const [formData, setFormData] = useState({
        username: '',
        emailAddress: '',
        password: ''
    });

    // Define un método handleChange para manejar los cambios en los campos del formulario
    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    // Define un método handleSubmit para enviar el formulario
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('http://localhost/taskflowbackend/public/api/singInData', formData, {
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            // Respuesta de Laravel en la consola
            console.log(response.data);

            //Obtener datos de la respuesta
            const jsonData = JSON.stringify(response.data)
            const parseData = JSON.parse(jsonData);
            const datosUsuario = parseData.usuario;
            Cookies.set('auth', JSON.stringify(datosUsuario), { expires: 3 }); //Expira en 3 días
            console.log('Se ha guardado los datos del usuario en el localStorage:', datosUsuario);

            // Redireccionar al usuario a home después de un breve tiempo
            setTimeout(() => {
                navigate('/home');
            }, 1000);

        } catch (error) {

            if (error.response) {
                console.error('Error en la respuesta del servidor:', error.response.data);
                console.error('Código de estado del servidor:', error.response.status);
                console.error('Cabeceras del servidor:', error.response.headers);
            } else if (error.request) {
                console.error('No se recibió respuesta del servidor:', error.request);
            } else {
                console.error('Error al configurar la solicitud:', error.message);
            }
            console.error('Configuración de la solicitud:', error.config);
        }
    };

    return (
        <div>
            <form onSubmit={handleSubmit}>
                {/* Campo de entrada para el nombre de usuario */}
                <div className='mt-16 mb-16 sm:mb-20'>
                    <input id='username' type='text' name='username' placeholder='Username' value={formData.username} onChange={handleChange} className='form-input border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]' />
                </div>
                {/* Campo de entrada para el correo electrónico */}
                <div className='my-16 sm:my-20'>
                    <input id='emailAddress' type='email' name='emailAddress' placeholder='Email' value={formData.emailAddress} onChange={handleChange} className='form-input border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]' />
                </div>
                {/* Campo de entrada para la contraseña */}
                <div className='my-16 sm:my-20'>
                    <input id='password' type='password' name='password' placeholder='Password' value={formData.password} onChange={handleChange} className='form-input border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]' />
                </div>
                {/* Botón de envío del formulario */}
                <div >
                    <input type='submit' value='SIGN IN' className='bg-[#0E0E0E] clamp-md hover:bg-green-600 text-white py-4 px-4 rounded-md w-full font-bold' />
                </div>
            </form>
        </div>
    );
}