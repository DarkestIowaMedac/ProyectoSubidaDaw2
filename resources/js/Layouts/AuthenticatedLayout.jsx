import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link, usePage } from '@inertiajs/react';
import Footer from '@/Components/Footer';
import { useState } from 'react';

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;

    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);
    const [menuOpen, setMenuOpen] = useState(false); // Estado para la hamburguesa

    return (
        <div className="bg-slate-300">
            {/* NAVBAR ARRIBA */}
            <div className="bg-gradient-to-r from-gray-900 via-blue-950 to-slate-950 text-white fixed w-full z-20 shadow-md shadow-gray-900">
                <div className="flex justify-between items-center px-4 h-16 w-full">
                    {/* Texto alineado a la izquierda */}
                    <div className="lg:text-3xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-blue-400 to-white hover:text-gray-300 hover:scale-105 hover:shadow-lg  transition duration-500 ease-in-out">
                        Informe Creator
                    </div>


                    {/* Sección derecha */}
                    <div className="flex items-center space-x-4">
                        {/* Menú de usuario */}
                        <div className="relative group">
                            <button className="flex items-center space-x-2 focus:outline-none">
                                <img src="logo.png" alt="Avatar" className="w-8 h-8 rounded-full border-blue-400 border-2" />
                                <span className="hidden md:block text-blue-400">{user.name}</span>
                            </button>

                            {/* Dropdown con opciones */}
                            <div className="absolute right-0 mt-2 w-48 bg-gray-900 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                                <ResponsiveNavLink 
                                    href={route('profile.edit')} active={route().current('profile.edit')}
                                    className="flex items-center w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-600 hover:text-white"
                                >
                                    <span className="material-icons text-blue-400 mr-2">account_circle</span>
                                    Perfil
                                </ResponsiveNavLink>
                                <ResponsiveNavLink
                                    href={route('logout')}
                                    method="post"
                                    as="button"
                                    className="flex items-center w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500 hover:text-white"
                                >
                                    <span className="material-icons text-blue-400 mr-2">logout</span>
                                    Cerrar Sesión
                                </ResponsiveNavLink>
                            </div>
                        </div>

                        {/* Botón hamburguesa (visible en pantallas pequeñas) */}
                        <button
                            onClick={() => setMenuOpen(!menuOpen)}
                            className="block md:hidden p-2 bg-gray-800 text-white rounded-md shadow-lg"
                        >
                            <svg className="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>



            {/* Menú lateral */}
            <div
                className={`fixed left-0 top-0 bg-gradient-to-b from-gray-900 via-blue-950 to-slate-950 w-64 h-full shadow-[4px_0px_10px_#111827] mt-16 transition-transform z-50 
                ${menuOpen ? "translate-x-0" : "-translate-x-full"} md:translate-x-0`}
            >
                <div className="p-4">
                    <div className="bg-gradient-to-r from-gray-700 to-gray-800 w-full h-16 flex items-center justify-center rounded-lg mb-6">
                        <h2 className="text-white text-xl font-semibold">MENU</h2>
                    </div>

                    <p className="text-xl font-semibold text-white mt-1 flex items-center space-x-2">
                        <svg className="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fillRule="evenodd" d="M10 2a8 8 0 11-7.71 5.21C4.97 7.88 6.18 8 7 8h6c.82 0 2.03-.12 2.71-.79A8 8 0 1110 2z" clipRule="evenodd" />
                        </svg>
                        <span>Bienvenido, <span className="text-blue-400">{user.name}</span></span>
                    </p>

                    <nav className="space-y-4 mt-5">
                        <ResponsiveNavLink
                            href={route('dashboard')}
                            active={route().current('dashboard') ? 'active' : undefined} // Solo pasa "active" si es verdadero
                            className="block py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300 ease-in-out transform hover:scale-105"
                        >
                            <span className="material-icons text-blue-400 mr-2">home</span>
                            Inicio
                        </ResponsiveNavLink>


                        <ResponsiveNavLink href={route('formulario')} active={route().current('formulario')}
                            className="py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300 ease-in-out transform hover:scale-105 flex items-center"
                        >
                            <span className="material-icons text-blue-400 mr-2">create</span>
                            Crear Muestra
                        </ResponsiveNavLink>

                        <ResponsiveNavLink href={route('profile.edit')} active={route().current('profile.edit')}
                            className="py-2 px-4 rounded-lg hover:bg-gray-600 transition duration-300 ease-in-out transform hover:scale-105 flex items-center"
                        >
                            <span className="material-icons text-blue-400 mr-2">account_circle</span>
                            Perfil
                        </ResponsiveNavLink>

                        <Link href={route('logout')} method="post" as="button"
                            className="w-full text-left text-white py-2 px-4 rounded-lg hover:bg-red-500 transition-all duration-300 ease-in-out transform hover:scale-105 flex items-center"
                        >
                            <span className="material-icons text-blue-400 mr-2">logout</span>
                            Cerrar Sesión
                        </Link>
                    </nav>
                </div>
            </div>

            {header && (
                <header className="bg-white shadow">
                    <div className="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {header}
                    </div>
                </header>
            )}

            <main className="md:ml-64 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6  transition-all">
                {children}
            </main>

            <Footer />
        </div>
    );
}
