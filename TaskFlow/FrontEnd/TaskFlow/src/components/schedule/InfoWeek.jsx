// importa el archivo CSS principal
import "../../index.css";
/**
 * Renders a component that displays information about a week, including a list of dates.
 *
 * @return {JSX.Element} The InfoWeek component.
 */
export function InfoWeek() {
    // define un arreglo de 7 elementos con valores enteros desde 0 hasta 6
    const dates = Array.from({ length: 7 }, (_, index) => index + 22);

    return (
        //contenedor de los dias de la semana que se mostraran
        <div className="bg-[#212121] mt-[4em] mx-[4vw] mb-[3rem] px-[4vw] py-[1.5vw] rounded-[2rem]">
            <p className="text-[#fff] md:text-[1.2vw] text-[2vw] pl-[1rem] pb-4">Fr, Ap, 2024</p>
            <div className="flex justify-between md:pb-0 pb-[2vw]">
                {/* se crean los botones con el valor de los dias de la semana por fecha */}
                {dates.map((date) => (
                    // botones con el valor de los dias de la semana
                    <button key={date} className="bg-[#fff] p-[3vw] rounded-full font-semibold md:w-[4vw] md:h-[4vw] w-[8vw] h-[8vw] flex items-center justify-center md:text-[1rem] text-[2vw] hover:scale-[1.04]">
                        {date}
                    </button>
                ))}
            </div>
        </div>
    )


}