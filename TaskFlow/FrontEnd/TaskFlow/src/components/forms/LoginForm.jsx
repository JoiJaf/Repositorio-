// Importa el hook useState desde React para manejar el estado del componente
import { useState } from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa los componentes LoginForm
import axios from 'axios';
// Importa el hook useNavigate
import { useNavigate } from "react-router-dom";
//Importar Cookie
import Cookies from 'js-cookie';

// Define el componente funcional LoginForm
export function LoginForm() {

    //Para redireccionar al usuario a la página de inicio (Home)
    const navigate = useNavigate();

    // Define un estado para el formulario de inicio de sesión y los datos del usuario
    const [formData, setFormData] = useState({
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
          const response = await axios.post('http://localhost/taskflowbackend/public/api/LoginData', formData, {
            
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
          Cookies.set('auth', JSON.stringify(datosUsuario), {expires: 7}); //Expira en 7 días
          console.log('Se ha guardado los datos del usuario:', datosUsuario); 

          // Redireccionar al usuario a home después de un breve tiempo
          setTimeout(() => {
            navigate('/home');  
          }, 1000); 

        } catch (error) {
            // Verificar la respuesta del servidor
            if (error.response) {
                console.error('Error en la respuesta del servidor:', error.response.data);
                console.error('Código de estado del servidor:', error.response.status);np
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
            {/* Campo de entrada para el correo electrónico */}
            <div className='my-16 sm:my-20'>
                <input id='emailAddress' type='email' name='emailAddress' placeholder='Email' value={formData.emailAddress} onChange={handleChange} className='form-input border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]' />
            </div>
            {/* Campo de entrada para la contraseña */}
            <div className='my-12 sm:my-28'>
                <input id='password' type='password' name='password' placeholder='Password' value={formData.password} onChange={handleChange} className='form-input border-b-2 clamp-md border-black w-full placeholder-[#0E0E0E]' />
            </div>
            {/* Enlace para recuperar la contraseña */}
            <div className='flex justify-center my-8'>
                <a href='#' className='clamp-sm text-center text-[#6BDD8F] hover:text-green-600'>Forgot Password?</a>
            </div>
            {/* Botón de envío del formulario */}
            <div >
                <input type='submit' value='LOGIN' className='bg-[#0E0E0E] clamp-md hover:bg-green-600 text-white py-4 px-4 rounded-md w-full font-bold' />
            </div>
        </form>
        </div>
    );
}