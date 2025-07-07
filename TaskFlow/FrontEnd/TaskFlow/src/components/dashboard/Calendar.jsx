// importa la dependencia de react-calendar
import Calendar from 'react-calendar';
// importa los estilos que trae por defecto el calendario
import 'react-calendar/dist/Calendar.css';
//importa el archivo css principal
import "../../index.css";
// define el componente del calendario
export function Cale() {

    return (
        // contenedor del componente del calendario
        <div className="my-[1rem] md:mr-[4vw] md:ml-4 mx-[4vw]">
            {/* Calendario importado desde la librería react-calendar */}
            <Calendar
                onClickDay={(value) => alert("Día " + value + "se le dio click")}
            />
        </div>
    )


}