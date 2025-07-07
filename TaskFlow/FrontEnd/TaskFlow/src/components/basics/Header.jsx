import logo from '../../assets/img/logo-blanco.png';// Importa la imagen del logo
import "../../index.css";// Importa estilos globales

import React, { useState } from 'react';// Importa React y el hook useState


export function Header() { // Define el componente Header como una función de React

  // Definicion de los dos estados locales usando el hook useState
  const [isOpen, setIsOpen] = useState(false);// Estado para controlar si el menú está abierto o cerrado
  const [searchValue, setSearchValue] = useState('');// Estado para almacenar el valor del campo de búsqueda

  // Función para alternar entre abrir y cerrar el menú
  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };
   // Función para manejar el cambio en el campo de búsqueda
  const handleSearchChange = (event) => {
    setSearchValue(event.target.value);
  };

  return (
    <nav className="sticky top-0 bg-[#0E0E0E] z-50">{/* Contenedorprincipal*/}
      <div className="container px-6 py-4 mx-auto flex justify-between items-center">{/* Contenedor de navbar*/}
        <div className="flex items-center">{/* Contenedor para el logo */}
          <a href="/welcomePage">
            <img className="w-auto h-6 sm:h-9 object-contain" src={logo} alt="logo" />
          </a>

        </div>

        <div className="flex items-center">{/* Contenedor de elementos de navegacion */}
          <div className="flex">{/* Contenedor para el campo de búsqueda y el botón del menú */}
            <div className="relative mr-4 pl-2 ">{/* Contenedor del campo de búsqueda */}
            {/* Barra de busqueda*/}
              <input
                type="text"
                value={searchValue}
                onChange={handleSearchChange}
                placeholder="Buscar..."
                className={`  sm:py-2 lg:px-16 sm:w-full w-40 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 ${isOpen && 'hidden lg:block'}`}
              />
              <div className="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">{/* Contenedor de Icono de búsqueda */}
                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">{/* Icono de búsqueda */}
                  <path d="M21 21l-6-6m2-5a8 8 0 1 1-16 0 8 8 0 0 1 16 0z" />
                </svg>
              </div>
            </div>
            {/* Botón para abrir/cerrar el menú en dispositivos pequeños */}
            <button
              onClick={toggleMenu}
              type="button"
              className="text-gray-200 lg:hidden dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
              aria-label="toggle menu"
            >
              {/* Icono para mostrar según el estado del menú */}
              {!isOpen ? (  
                <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M4 8h16M4 16h16" />
                </svg>
              ) : (
                <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              )}
            </button>
          </div>
          {/* Este div controla la visibilidad del menú en pantallas pequeñas. Se muestra si la variable isOpen es true, de lo contrario se oculta. */}
          <div className={`lg:hidden ${isOpen ? 'block' : 'hidden'}`}>
            {/* Este div crea un fondo oscuro tras el menú desplegado en pantallas pequeñas. Al hacer clic en él, se cierra el menú. */}
            <div className="fixed inset-0 bg-[#0E0E0E] bg-opacity-50 z-50" onClick={toggleMenu}></div>
            {/* Este div contiene el menú desplegable en pantallas pequeñas. */}
            <div className="fixed inset-y-0 right-0 z-50 bg-[#0E0E0E] w-64 flex flex-col py-4">
              {/* Contenedor de la foto de perfil y el nombre del usuario  */}
              <div className="flex items-center justify-center mt-4 lg:mt-0">
                  {/* Botón para mostrar la foto de perfil del usuario */}
                <a href='/profilePage' type="button" className="flex flex-col items-center justify-center focus:outline-none">
                  <div className="w-10 h-10 overflow-hidden border-2 border-gray-400 rounded-full mb-1">
                      {/* Foto de perfil del usuario */}
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" className="object-cover w-full h-full" alt="avatar" />
                  </div>
                  {/* Nombre del usuario */}
                  <h3 className="text-gray-200 dark:text-gray-200 hover:text-gray-700 lg:hidden">María Segura</h3>
                </a>
              </div>
               {/* Enlaces del menú desplegable en mobile */}
              <a href="/dashboard" class="text-gray-200 hover:text-gray-700 dark:text-gray-200 hover:bg-gray-100 py-2 px-6 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home w-6 h-6 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24" stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
                Home
              </a>
              <a href="/notificationPage" class="text-gray-200 hover:text-gray-700 dark:text-gray-200 hover:bg-gray-100 py-2 px-6 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg class="w-6 h-6 mr-2 stroke-current hover:stroke-gray-700 transition-colors duration-300 transform hover:scale-110" viewBox="0 0 24 24" stroke="#CCCCCC" fill="none" strokeLinecap="round" strokeLinejoin="round">
                  <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" />
                </svg>
                Notification
              </a>

              <a href="/schedulePage" class="text-gray-200 hover:text-gray-700 dark:text-gray-200 hover:bg-gray-100 py-2 px-6 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event w-6 h-6 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                  <path d="M16 3l0 4" />
                  <path d="M8 3l0 4" />
                  <path d="M4 11l16 0" />
                  <path d="M8 15h2v2h-2z" />
                </svg>
                Calendar
              </a>

              <a href="/coursesPage" class="text-gray-200 hover:text-gray-700 dark:text-gray-200 hover:bg-gray-100 py-2 px-6 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book w-6 h-6 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M6 4v16l6 -2l6 2V4" />
                  <path d="M6 4l6 6l6 -6" />
                </svg>
                Courses
              </a>

              <a href="/settingsPage" class="text-gray-200 hover:text-gray-700 dark:text-gray-200 hover:bg-gray-100 py-2 px-6 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings w-6 h-6 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                  <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                </svg>
                Settings
              </a>
            </div>
          </div>
          {/* Este div controla la visibilidad del menú en pantallas grandes.*/}
          <div className={`hidden lg:flex lg:items-center `}>
            {/* Enlaces del menú en pantallas grandes*/}
            <div className="flex flex-col mx-4 lg:flex-row lg:items-center lg:mx-6">
              <a href="/dashboard" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home w-8 h-8 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
                Home
              </a>

              <a href="/schedulePage" class="text-gray-200 hover:text-gray-700 hover:bg-gray-100 py-2 px-3 mx-3 flex items-center transition-colors duration-300 transform rounded-md hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event w-8 h-8 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                  <path d="M16 3l0 4" />
                  <path d="M8 3l0 4" />
                  <path d="M4 11l16 0" />
                  <path d="M8 15h2v2h-2z" />
                </svg>
                Calendar
              </a>

              <a href="/coursesPage" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book w-8 h-8 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#CCCCCC"
                  fill="none"
                  stroke-linecap="round" s
                  troke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M6 4v16l6 -2l6 2V4" />
                  <path d="M6 4l6 6l6 -6" />
                </svg>
                Courses
              </a>

              <a href="/settingsPage" class="flex items-center px-3 py-2 mx-3 mt-2 text-gray-200 hover:text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings w-8 h-8 mr-2 stroke-current hover:stroke-gray-600"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="#CCCCCC" fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                  <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                </svg>
                Settings
              </a>



            </div>

            <div className="flex items-center mt-4 lg:mt-0">
              <a href='/notificationPage' className="hidden mx-4 p-2 text-gray-100 transition-colors duration-300 transform lg:block dark:text-gray-200 hover:text-gray-700 focus:outline-none" aria-label="mostrar notificaciones">
                <svg class="w-6 h-6">
                  <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                    stroke="#CCCCCC"
                    strokeWidth="2"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    class="transition-colors duration-300 transform hover:stroke-gray-600"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg" />
                </svg>
              </a>

              <a href='/profilePage' type="button" className="flex items-center justify-center focus:outline-none">
                <div className="flex items-center">
                  <div className="w-10 h-10 overflow-hidden border-2 border-gray-400 rounded-full transition-transform hover:scale-110">
                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" className="object-cover w-full h-full" alt="avatar" />
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>{/* Fin Contenedor de elementos de navegacion */}
      </div>
    </nav>
  );
}
