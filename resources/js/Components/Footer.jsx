import React from 'react';
import { Link } from 'react-router-dom';

const Footer = () => {
    return (
        <footer className="bg-gradient-to-r from-gray-900 via-blue-950 to-slate-950 text-white p-4 mt-10 w-full fixed bottom-0">
            <div className="max-w-screen-xl mx-auto flex justify-end items-center space-x-6">
                {/* Espacio para los enlaces */}
                <div className="space-x-4">
                    <Link to="/" className="hover:text-gray-300 transition-colors duration-200">INFORME CREATOR</Link>
                </div>

                {/* Pie de página con el texto */}
                <div>
                    <p className="text-xs text-right md:text-left">
                        &copy; 2025 Informe Creator. Todos los derechos reservados.
                    </p>
                </div>

                {/* Redes sociales */}
                <div className="flex space-x-4">
                    <a href="#" className="text-white hover:text-gray-300 transition-colors duration-200">
                        <i className="fab fa-facebook"></i> 
                    </a>
                    <a href="#" className="text-white hover:text-gray-300 transition-colors duration-200">
                        <i className="fab fa-twitter"></i>
                    </a>
                    <a href="#" className="text-white hover:text-gray-300 transition-colors duration-200">
                        <i className="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
