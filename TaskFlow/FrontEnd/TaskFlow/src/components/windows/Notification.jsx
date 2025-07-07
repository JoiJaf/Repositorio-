// Importa los estilos globales y la imagen del usuario.
import "../../index.css";
import user from "../../assets/img/user.png";

/**
 * Componente Notification
 * 
 * Este componente muestra una sección de notificaciones con mensajes de usuarios y otras alertas.
 * Incluye una cabecera, una lista de notificaciones y un botón para marcar todas las notificaciones como leídas.
 * 
 */
export function Notification() {
  return (
    <section className="w-full max-w-[35rem] mt-24 rounded-lg mx-auto px-4 mb-12">
      <div className="bg-[#6BDD8F] p-4 rounded-lg">
        <div className="flex justify-between items-center">
          <h1 className="text-3xl text-white">Notifications</h1>
          <a className="text-3xl text-white" href="">
            -
          </a>
        </div>
        <h2 className="text-lg text-[#787878] mt-2">
          You have 2 new messages and one notification
        </h2>
      </div>

      <section className="mt-8 space-y-4">
        {/* Notificación 1 */}
        <div className="flex items-start space-x-4">
          <img className="w-12 h-12 rounded-lg" src={user} alt="user" />
          <div className="flex-1 bg-[#D9D9D9] p-4 rounded-lg">
            <h1 className="text-xl font-bold">John Doe</h1>
            <p className="text-[#787878]">
              Hey, just wanted to follow up on our meeting yesterday. Let me
              know if you have any questions!
            </p>
            <h2 className="text-right text-[#787878]">5m ago</h2>
          </div>
        </div>

        {/* Notificación 2 */}
        <div className="flex items-start space-x-4">
          <img className="w-12 h-12 rounded-lg" src={user} alt="user" />
          <div className="flex-1 bg-[#D9D9D9] p-4 rounded-lg">
            <h1 className="text-xl font-bold">Jane Smith</h1>
            <p className="text-[#787878]">
              Did you see the new design updates I sent over? Let me know what
              you think.
            </p>
            <h2 className="text-right text-[#787878]">1h ago</h2>
          </div>
        </div>

        {/* Notificación de una nueva tarea */}
        <div className="flex items-start space-x-4">
          <img className="w-12 h-12 rounded-lg" src={user} alt="user" />
          <div className="flex-1 bg-[#D9D9D9] p-4 rounded-lg">
            <h1 className="text-xl font-bold">New Task</h1>
            <p className="text-[#787878]">
              Make 3 different 3D models for our next class.
            </p>
            <h2 className="text-right text-[#787878]">1h ago</h2>
          </div>
        </div>

        {/* Notificación de la universidad */}
        <div className="flex items-start space-x-4">
          <img className="w-12 h-12 rounded-lg" src={user} alt="user" />
          <div className="flex-1 bg-[#D9D9D9] p-4 rounded-lg">
            <h1 className="text-xl font-bold">University</h1>
            <p className="text-[#787878]">Welcome to ITM!</p>
            <h2 className="text-right text-[#787878]">8h ago</h2>
          </div>
        </div>
      </section>

      <div className="flex justify-center mt-8">
        <button
          className="bg-[#6BDD8F] text-2xl text-white px-12 py-2 rounded-lg"
          href="Mark all as read"
        >
          Mark all as read
        </button>
      </div>
    </section>
  );
}