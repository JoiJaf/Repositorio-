// Importa los estilos globales.
import "../../index.css";
import React from 'react';

/**
 * Componente EventCategorySelector
 * 
 * Este componente permite al usuario seleccionar una categoría de evento desde un menú desplegable.
 * Utiliza el estado interno para manejar el valor seleccionado.
 */
export class EventCategorySelector extends React.Component {
  constructor(props) {
    super(props);
    // Inicializa el estado con un valor vacío.
    this.state = { value: '' };

    // Vincula el método handleChange al contexto del componente.
    this.handleChange = this.handleChange.bind(this);
  }

  /**
   * Maneja el cambio de selección en el menú desplegable.
   * 
   *  {Object} event - El evento de cambio de selección.
   */
  handleChange(event) {
    // Actualiza el estado con el valor seleccionado.
    this.setState({ value: event.target.value });
  }

  render() {
    return (
      <div className="">
        <label className="text-[1.6rem]">
          Select event category:
          <select value={this.state.value} onChange={this.handleChange}>
            <option value="category1">Event</option>
            <option value="category2">Message</option>
            <option value="category3">Homework</option>
          </select>
        </label>
      </div>
    );
  }
}
