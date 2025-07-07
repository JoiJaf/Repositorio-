// Componentes que estarán en la pagina del Dashboard
import { Cale } from "./Calendar.jsx";
import { Category } from "./Category.jsx";
import { Stadistics } from "./Stadistics.jsx";
import { Task } from "./TaskCarousel.jsx";
import { Today } from "./Today.jsx";
// Componentes que estarán en la pagina del Dashboard

// define la pagina del dasboard como tal
export function Dashboard() {

    return (
        //llamado de los componentes
        <div> 
            <Task />
            {/* contenedor de los componentes de la fecha y el calendario */}
            <div className="md:flex bg-[#FCF8EC] mt-[2rem] pt-[2rem] pb-[4rem] ">
                <Today />
                <Cale />
            </div>
            <Stadistics />
            <Category />        
        </div>
    )
}