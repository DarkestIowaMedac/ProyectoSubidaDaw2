import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

const MuestraDetalles = ({ muestra }) => {
    // Asegúrate de que 'muestra' sea un objeto con las propiedades 'nombre' y 'descripcion'
    const { nombre, descripcion } = muestra;

    return (
        <>
            <Head title="Detalles de la Muestra" />
            <div className="max-w-2xl mx-auto p-6 border border-gray-700 rounded-lg shadow-lg bg-gray-800 text-white">
                {/* Título */}
                <h1 className="text-2xl font-bold mb-4 text-blue-400">{nombre}</h1>

                {/* Descripción */}
                <p className="text-lg text-gray-300 mb-6">{descripcion}</p>

                {/* Botón Volver con Icono */}
                <button
                    className="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-md transition duration-300"
                    onClick={() => window.history.back()}
                >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M480-120 120-480l360-360 42 42-278 278h716v60H244l278 278-42 42Z" />
                    </svg>
                    Volver
                </button>
            </div>
        </>
    );

};

export default MuestraDetalles;
