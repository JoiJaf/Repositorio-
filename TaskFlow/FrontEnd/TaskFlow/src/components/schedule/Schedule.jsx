// componentes que estaran en la pagina del schedule
import { InfoWeek } from "./InfoWeek.jsx";
import { Tasks } from "./Task.jsx";
import { Cale } from "../dashboard/Calendar.jsx";
import { TaskToday } from "./TaskToday.jsx";
//componentes que estaran en la pagina del schedule

// define la pagina del schedule como tal
export function Schedule() {

    return (
        <div>
            <InfoWeek />
            <TaskToday />
            {/* divide en columnas el calendario y las tareas */}
            <div className="md:grid md:grid-cols-2 md:ml-[4vw]">
                <Cale />
                <Tasks />
            </div>
        </div>
    )
}