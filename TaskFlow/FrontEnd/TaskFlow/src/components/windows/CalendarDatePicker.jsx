// Importa los estilos globales y las dependencias necesarias.
import "../../index.css";
import React, { useState } from 'react';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';

/**
 * Componente CalendarDatePicker
 * 
 * Este componente representa un selector de fechas (DatePicker) integrado con un icono de calendario.
 * Permite a los usuarios seleccionar una fecha y muestra la fecha seleccionada en el formato "dd/MM/yyyy".
 * 
 */
export function CalendarDatePicker() {
  // Estado para almacenar la fecha seleccionada.
  const [selectedDate, setSelectedDate] = useState(null);

  /**
   * Maneja el cambio de fecha.
   * 
   *  {Date} date - La nueva fecha seleccionada.
   */
  const handleDateChange = (date) => {
    setSelectedDate(date);
  };

  return (
    <div className="grid grid-cols-[6%_30%] gap-[1rem]">
      {/* Icono de calendario */}
      <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-calendar-event" width="2rem"
        height="2rem" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
        <path d="M16 3l0 4" />
        <path d="M8 3l0 4" />
        <path d="M4 11l16 0" />
        <path d="M8 15h2v2h-2z" />
      </svg>
      {/* Componente DatePicker para seleccionar una fecha */}
      <DatePicker className="text-[1.4rem]"
        selected={selectedDate}
        onChange={handleDateChange}
        dateFormat="dd/MM/yyyy"
        placeholderText="dd/mm/aaaa"
      />
    </div>
  );
}