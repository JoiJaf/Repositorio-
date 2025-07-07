// Importa el hook useState desde React para manejar el estado del componente
import React, { useState } from 'react';

// Define el componente funcional RoundToggleButton
function RoundToggleButton() {
  // Se usa el hook useState para manejar el estado del botón
  const [isActive, setIsActive] = useState(false);

  // Función para alternar entre activar y desactivar el botón
  const toggleActive = () => {
    
    // Actualiza el estado del botón
    setIsActive(!isActive);

    if (!isActive) {
      console.log('Activado');
    } else {
      console.log('Desactivado');
    }
    
  };

  return (
    // Creación del botón y su fondo con estilos personalizados
    <button
      className={`rounded-full w-[7rem] h-[3.5rem] flex justify-left ${isActive ? 'bg-[#6BDD8F]' : 'bg-[#e2e8f0]'} text-white focus:outline-none`}
      onClick={toggleActive}>
      {/* Creación del circulo del botón con estilos personalizados */}
      <div className={`w-[3.5rem] h-[3.5rem] bg-white rounded-full shadow-md transform transition-transform ${isActive ? 'translate-x-full' : 'translate-x-0'}`}></div>
    </button>
  );
}

// Exporta el componente RoundToggleButton
export default RoundToggleButton;
