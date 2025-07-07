// Importa los estilos globales.
import "../../index.css";
import React, { useState } from "react";

/**
 * Componente EventDescription
 * 
 * Este componente representa un área de texto donde los usuarios pueden ingresar una descripción para un evento.
 * Utiliza el estado interno para manejar el valor de la descripción ingresada.
 * 
 */
export function EventDescription() {
  // Estado para almacenar la descripción del evento.
  const [description, setDescription] = useState("");

  return (
    <textarea
      className="border-[.1rem] border-[black] mt-[1rem] mx-auto w-[calc(100%-4rem)] md:w-[24.5rem] p-[.5rem]"
      value={description}
      onChange={(e) => setDescription(e.target.value)}
      rows="6"
      placeholder="Description..."
    />
  );
}