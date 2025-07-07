import React, { useState, useEffect } from 'react';
import "../../index.css";

/**
 * Renders a component that displays the current date, time, and week.
 * 
 * @return {JSX.Element} A React component that displays the current date, time, and week.
 */
export function Today() {
    /**
     * The current day of the week.
     */
    const [week, setCurrentDay] = useState('');
    /**
     * The current month.
     */
    const [month, setCurrentMonth] = useState('');
    /**
     * The current date.
     */
    const [date, setCurrentDate] = useState('');
    /**
     * The current year.
     */
    const [year, setCurrentYear] = useState('');
    /**
     * The current time (in 24 hour format).
     */
    const [time, setCurrentTime] = useState('');

    /**
     * A useEffect hook that runs once, and sets the current day of the week.
     */
    useEffect(() => {
        function day() {
            const fecha = new Date();
            const hoy = fecha.getDay();
            const days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
            return days[hoy];
        }
        setCurrentDay(day());
    }, []);

    /**
     * A useEffect hook that runs once, and sets the current month.
     */
    useEffect(() => {
        function month() {
            const fecha = new Date();
            const mes = fecha.getMonth();
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            return meses[mes];
        }
        setCurrentMonth(month());
    }, []);

    /**
     * A useEffect hook that runs once, and sets the current date.
     */
    useEffect(() => {
        function date() {
            const fecha = new Date();
            const date = fecha.getDate();
            return date;
        }
        setCurrentDate(date());
    }, []);

    /**
     * A useEffect hook that runs once, and sets the current year.
     */
    useEffect(() => {
        function year() {
            const fecha = new Date();
            const year = fecha.getFullYear();
            return year;
        }
        setCurrentYear(year());
    }, []);

    /**
     * A useEffect hook that runs every second, and updates the current time.
     */
    useEffect(() => {
        const intervalTime = setInterval(() => {
            const fecha = new Date();
            const hours = ((fecha.getHours() < 10) ? "0" : "") + fecha.getHours();
            const minutes = ((fecha.getMinutes() < 10) ? "0" : "") + fecha.getMinutes();
            setCurrentTime(`${hours}:${minutes}`);
            document.getElementById('time').innerHTML = hours + ":" + minutes;
        }, 1000);
        return () => clearInterval(intervalTime);
    }, []);

    // Fecha y hora en tiempo real -----------------------

    return (
        // contenedor para las etiquetas de la fecha y hora y del semestre actual
        <div className='grid md:my-10 md:mx-0 mx-[4vw]'>
            {/* componente que muestra la fecha y hora */}
            <div className="md:ml-[4vw] grid border-solid border-2 border-[#E0E0E0] lg:w-[30vw] md:h-[15vw] h-[10rem] md:p-[3vw] px-[8vw] pb-[2rem] pt-[1rem] rounded-[3rem] bg-white hover:border-[#424242] hover:duration-[2s]">
                <p className="md:text-[1rem] text-[.8rem] font-semibold">Today is</p>
                <p className="md:text-[1.5rem] text-[1.2rem] font-semibold ">{week}</p>
                <p className="md:text-[1rem] text-[.8rem] font-semibold pb-[1vw]">{month} {date}, {year}</p>
                <p className=" md:text-[1.5rem] text-[1.5rem] font-semibold text-right" id='time'></p>
            </div>
            {/* componente que muestra el semestre */}
            <div className="md:ml-[4vw] mt-[2vw] border-2 rounded-[3rem] p-[2rem] lg:w-[30vw] bg-white flex justify-center items-center">
                <p className="text-[1.5rem] font-bold">I semester <br /> <span className='text-[1.6rem]'>6th week</span></p>
            </div>
        </div>
    )
}
