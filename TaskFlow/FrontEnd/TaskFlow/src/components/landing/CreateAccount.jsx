// Importa los estilos globales.
import "../../index.css";

/**
 * Componente CreateAccount
 * 
 * Este componente representa una sección para invitar a los usuarios a crear una cuenta.
 * Incluye un título y un botón que redirige a la página de creación de cuenta.
 * 
 */
export function CreateAccount() {
  return (
    <div>
      {/* Sección principal con fondo oscuro y contenido centrado */}
      <div className="text-center bg-[#212121] py-20 md:py-[10rem]">
        {/* Título para crear una cuenta */}
        <h1 className="text-2xl md:text-4xl font-bold mb-8 md:mb-[2rem] text-white">
          Create your account and keep
          <br className="md:block" />
          your tasks up to date!
        </h1>
        {/* Botón para redirigir a la página de creación de cuenta */}
        <a
          className="text-lg md:text-xl text-white border-2 border-[#6BDD8F] rounded-md w-48 h-12 px-8 py-4 md:w-[13rem] md:h-[3rem] justify-center bg-[#6BDD8F]"
          href="/formsPage"
        >
          Create Account
        </a>
      </div>
    </div>
  );
}