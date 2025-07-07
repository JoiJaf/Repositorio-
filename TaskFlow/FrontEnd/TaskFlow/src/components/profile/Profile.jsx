// Importa el archivo CSS principal
import "../../index.css";
// Importa los componente ProfileHeader, PersonalInformation y HealthCondition
import { ProfileHeader } from "./ProfileHeader";
import { PersonalInformation } from "./PersonalInformation";
import { HealthCondition } from "./HealthCondition";
import { useFetchUsers } from  "../hooks/useFetchUsers.js";
import Cookies from 'js-cookie';

// Define el componente funcional Profile
export function Profile() {

  const { data } = useFetchUsers();
  console.log('longitudArray: ' + data.length);
  const datos = Cookies.get('auth');
  console.log('Cookies:' + datos);
  
  const getUserIdFromCookie = () => {
    const authData = Cookies.get('auth');
  
    if (authData) {
      const parsedAuthData = JSON.parse(authData);
      return {
        user_specific_id: parsedAuthData.user_specific_id || null,
        id: parsedAuthData.id || null
      };
    }
  
    return { user_specific_id: null, id: null };
  };

  const filteredItem = () => {
    const { user_specific_id, id } = getUserIdFromCookie();
    
    for (let i = 0; i < data.length; i++) {
      if (data[i].id === parseInt(id) || data[i].id === parseInt(user_specific_id)) {
        return data[i];
      }
    }
    
    return null;
  };
  

  const dataUser = (item) => {
    
    if (!item) {

      return <p>No existen detalles para este ID.</p>;

    }return(

    <ProfileHeader 
      key = {item.id} 
      name = {item.user_name}
      email = {item.email}
    />
    
    );
  }

  return (
    // Contenedor principal con estilos para el componente perfil
    <section className="grid relative lg:w-full mb-[2.37rem]">
      <section className="absolute bg-[#FCF8EC] h-[54rem] top-[16rem] mb-[2.37rem] w-full max-md:h-[93.75rem]"></section>
      <h2 className="mt-[2.37rem] ml-[2.37rem] clamp-xxl font-bold">Profile</h2>
      {/* Formulario para cambiar información de perfil */}
      <form method="post" action="#">
      {/* Renderiza ProfileHeader, seccion principal de perfil */}
      <section className="relative flex items-center justify-center m-[1.125rem]">
        { dataUser(filteredItem()) }
      </section>

      {/* Renderiza PersonalInformation y HealthCondition, otras secciones de perfil */}
      <section className="relative grid">
        <h3 className="clamp-xl text-[#323233] font-medium mx-[2.37rem] ">Personal Information</h3>
        <PersonalInformation />
        <HealthCondition />
      </section>
      </form>
    </section>
  )
}
