// Importa la dependencia de react
import React from 'react';
// Importa el archivo CSS principal para estilos globales
import "../../index.css";
// Importa el hook useNavigate
import { useNavigate } from 'react-router-dom';
//Importar Cookie
import Cookies from 'js-cookie';
//Logout image
import logout from '../../assets/img/log out.png';

// Define el componente funcional Logout
export function Logout() {

    // Define el hook useNavigate
    const navigate = useNavigate();

    // Define un método handleLogout para cerrar la sesión
    const handleLogout = () => {
        Cookies.remove('auth');
        console.log("Se ha borrado la cookie de autenticación");
        navigate('/');
        window.location.reload();
    };

    // Renderiza el componente Logout
    return (
        <div className='justify-start'>
            {/* Botón para cerrar sesión */}
             <button className='flex clamp-lg hover:text-[#6BDD8F] ml-[3rem] my-5' onClick={handleLogout}>
             <img className="w-auto sm:h-9 object-contain" src={logout} alt="" /></button>
        </div>
    );
}