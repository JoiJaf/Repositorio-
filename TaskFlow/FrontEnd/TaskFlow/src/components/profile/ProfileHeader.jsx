// Importa el archivo CSS principal
import "../../index.css";

// Define componente funcional ProfileHeader
export function ProfileHeader({name, email}) {
  
    return (
        // Contenedor principal de inicio del perfil de usuario
        <div className="grid grid-cols-3 gap-4 items-center max-md:grid-cols-1">
          {/* Imagen de de perfil del usuario */}
          <div className="m-[1.25rem] flex justify-center items-center">
            <img className="rounded-full item-center" src="../src/assets/img/profile.png" alt="profile" />
          </div>
          {/* Información del usuario: nombre y correo electrónico */}
          <div className="flex flex-col max-md:items-center">
            <h1 className="mt-[2.375rem] clamp-xxl font-bold">{ name }</h1>
            <p className="text-[#A7A7A7] clamp-md">{ email }</p>
          </div>
          {/* Contenedor del botón de envío del formulario */}
          <div className="flex justify-center items-center p-4 max-md:mb-[2.375rem]">
            <input type="submit" value="Update" className="bg-[#212121] clamp-lg text-white py-4 px-4 rounded-[1.25rem] w-[11.875rem]" />
          </div>
        </div>
      );
}

ProfileHeader.defaultProps = {
  
  name: 'María Segura Umaña',
  email: 'mariaumasegur@example.com'

}
