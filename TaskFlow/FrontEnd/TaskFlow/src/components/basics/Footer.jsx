// Importa el archivo CSS principal para estilos globales
import "../../index.css";

// Importa imágenes necesarias para el footer
import playstore from '../../assets/img/google-play.png';
import appstore from '../../assets/img/ios.png';
import logo from '../../assets/img/logo-blanco.png';

// Define el componente funcional Footer
export function Footer() {
    return (
        // Contenedor principal del footer con clases de estilo
        <footer className="footer-container bg-[#0E0E0E]">
            {/* Div contenedor con una grid responsive */}
            <div className="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] w-80vw gap-6 text-[#CCCCCC] form-grid-cols-2">
                {/* Sección del logo y enlaces de descarga */}
                <section>
                    <div className="w-60 ml-12 sm:ml-12 mt-4 sm:mt-0">
                        {/* Enlace al logo */}
                        <a className="ml-12" href="logo">
                            {/* Imagen del logo */}
                            <img className="max-w-full h-auto mb-4 pt-8 mb-logo-footer" src={logo} />
                        </a>
                        {/* Título para la sección de descarga de la app */}
                        <h1 className="text-[#CCCCCC]">Download Our App</h1>
                        {/* Grid para las imágenes de Play Store y App Store */}
                        <div className="grid grid-cols-2 gap-4">
                            <div className="mb-footer-imgs">
                                <img src={playstore} alt="Google Play Store" />
                            </div>
                            <div className="mb-footer-imgs">
                                <img src={appstore} alt="Apple App Store" />
                            </div>
                        </div>
                    </div>
                </section>
                {/* Div para las secciones de enlaces */}
                <div className="grid grid-cols-[repeat(auto-fit,minmax(150px,1fr))] gap-4 py-14">
                    {/* Sección de "Get to Know Us" */}
                    <section className="grid items-center justify-center">
                        <h3>Get to Know Us</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Learn</a></li>
                            <li><a href="#">Discover</a></li>
                        </ul>
                    </section>
                    {/* Sección de "Plan with Us" */}
                    <section className="grid items-center justify-center">
                        <h3>Manage with Us</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a className="nav-bottom-link" href="#">Access</a></li>
                            <li><a className="nav-bottom-link" href="#">Manage</a></li>
                            <li><a className="nav-bottom-link" href="#">Categories</a></li>
                        </ul>
                    </section>
                    {/* Sección de "Your Account" */}
                    <section className="grid items-center justify-center">
                        <h3></h3>
                        <ul>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">Your Tasks</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Submit Feedback</a></li>
                        </ul>
                    </section>
                </div>
            </div>
            {/* Texto de derechos reservados */}
            <p className="text-center text-[#CCCCCC] py-10"> @All rights reserved</p>
        </footer>
    )
}