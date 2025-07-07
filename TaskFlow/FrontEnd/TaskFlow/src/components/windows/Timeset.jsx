import React, { useState } from 'react';

/**
 * Componente Timeset
 * 
 * Este componente representa un selector de hora. Permite al usuario seleccionar una hora específica
 * y actualiza el estado interno del componente con la hora seleccionada.
 * 
 * 
 */
export function Timeset() {
  // Estado para almacenar la hora seleccionada. Inicializado a '10:00'.
  const [time, setTime] = useState('10:00');

  return (
    <div className="time-picker">
      {/* Input para seleccionar la hora */}
      <input className="text-[1.4rem] ml-[-.6rem]"
        type="time"
        value={time}
        onChange={(e) => setTime(e.target.value)}
      />
    </div>
  );
}