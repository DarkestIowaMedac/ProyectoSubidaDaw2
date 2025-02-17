import { Head, Link } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Bienvenido" />

            <div className="relative min-h-screen bg-cover bg-center">
                <div className="absolute inset-0 bg-gradient-to-r from-slate-950 via-blue-950 to-slate-950"></div>

                {/* Contenido Principal */}
                <div className="relative z-10 flex flex-col md:flex-row items-center justify-between min-h-screen text-white px-6 lg:px-20 py-12">

                    {/* Sección de Texto e Información */}
                    <div className="md:w-1/2 text-left space-y-6">
                        <h1 className="text-5xl font-extrabold drop-shadow-lg leading-tight animate-fadeInUp">
                            Gestiona tus Informes de Muestras con Precisión
                        </h1>
                        <p className="text-lg text-gray-300 animate-fadeInUp delay-100">
                            Nuestra plataforma te ofrece herramientas avanzadas para gestionar, analizar y optimizar tus muestras de manera segura y eficiente.
                        </p>

                        {/* Botones de Acceso */}
                        <div className="mt-6 flex flex-col sm:flex-row space-x-0 sm:space-x-4 space-y-4 sm:space-y-0">
                            {auth.user ? (
                                <Link
                                    href={route("dashboard")}
                                    className="px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 animate-fadeInUp "
                                >
                                    Ir al Dashboard
                                </Link>
                            ) : (
                                <>
                                    <Link
                                        href={route("login")}
                                        className="px-6 py-3 bg-gray-700 text-white text-lg font-semibold rounded-lg shadow-white hover:bg-gray-900 transition duration-300 animate-fadeInUp "
                                    >
                                        Iniciar Sesión
                                    </Link>
                                    <Link
                                        href={route("register")}
                                        className="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-green-600 transition duration-300 animate-fadeInUp "
                                    >
                                        Registrarse
                                    </Link>
                                </>
                            )}
                        </div>
                    </div>

                    {/* Sección de Imagen (Eliminada en esta versión) */}
                </div>

                {/* Sección de Información */}
                <section className="relative z-10 bg-white text-blue-950 py-16 text-center">
                    <h2 className="text-3xl font-bold">¿Por qué elegirnos?</h2>
                    <p className="mt-4 text-lg max-w-3xl mx-auto">
                        Nuestra plataforma ofrece seguridad, rapidez y facilidad en la gestión de datos. Explora todas nuestras herramientas y optimiza tu flujo de trabajo.
                    </p>

                    <div className="mt-8 flex flex-wrap justify-center gap-8">
                        <div className="max-w-xs text-center p-6 bg-gray-100 rounded-lg shadow-lg">
                            <h3 className="text-xl font-semibold">Seguridad</h3>
                            <p className="text-gray-600 mt-2">Protegemos tus datos con las últimas tecnologías.</p>
                        </div>
                        <div className="max-w-xs text-center p-6 bg-gray-100 rounded-lg shadow-lg">
                            <h3 className="text-xl font-semibold">Velocidad</h3>
                            <p className="text-gray-600 mt-2">Optimizado para rendimiento y rapidez.</p>
                        </div>
                        <div className="max-w-xs text-center p-6 bg-gray-100 rounded-lg shadow-lg">
                            <h3 className="text-xl font-semibold">Facilidad</h3>
                            <p className="text-gray-600 mt-2">Interfaz intuitiva y sencilla de usar.</p>
                        </div>
                    </div>
                </section>

                {/* Footer */}
                <footer className="bg-black text-gray-400 text-center py-6">
                    <p>Laravel v{laravelVersion} | PHP v{phpVersion}</p>
                </footer>
            </div>
        </>
    );
}
