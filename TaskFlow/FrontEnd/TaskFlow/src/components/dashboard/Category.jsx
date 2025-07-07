// importa las imagenes desde los assets
import carrera from '../../assets/img/carre.png';
import uni from '../../assets/img/uni.png';
import course from '../../assets/img/course.png';
import students from '../../assets/img/est.png';
// importa las imagenes desde los assets

// importa el archivo CSS principal
import "../../index.css";
import { useFetchCategory } from '../hooks/useFetchCategories';
// define el componente de Category
export function Category() {
    // carga por medio de un array las imagenes y el texto que llevaran las categoria
    const { data, isLoading } = useFetchCategory();
    console.log(data);

    const items = [
        { id: 1, imageUrl: carrera, text: 'Careers' },
        { id: 2, imageUrl: course, text: 'Courses' },
        { id: 3, imageUrl: uni, text: 'University' },
        { id: 4, imageUrl: students, text: 'Student' }
    ];

    return (
        <div className="bg-[#FCF8EC] pt-[8vw] pb-[4vw] px-[10vw]">
            {/* contenedor de las categorias */}
            <div>
                <div className='grid gap-[1vw] md:grid-cols-2 grid-cols-1'>
                    {/* bucle que crea los cuadros de las categorias*/}
                    {data.map((item) => (
                        //contenedor de los cuadros de categorias para darles estilos
                        <div key={item.id} className='p-[2vw] flex place-items-center border-2 rounded-[2vw] bg-white hover:scale-[1.02] hover:duration-500'>
                            <img className='w-[8vw]' src={item.imageUrl} alt={item.text} />
                            <p className='clamp-lg m-[auto]'>{item.category_name}</p>
                            {/* boton que redirecciona */}
                            <button className='bg-[#212121] py-[.5vw] px-[1.5vw] text-[#fff] rounded-[1rem] mt-[6vw] hover:bg-[#2f2f2f]'>
                                View all ~
                            </button>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}