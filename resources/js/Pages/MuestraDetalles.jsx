import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

const MuestraDetalles = ({ muestra }) => {
    // Asegúrate de que 'muestra' sea un objeto con las propiedades 'nombre' y 'descripcion'
    const { id, updated_at, created_at, user_id,sede_id, formato_id, codigo, fecha} = muestra;

    return (
        //<AuthenticatedLayout>
            <div className="max-w-2xl mx-auto p-6 border border-gray-300 rounded-lg shadow-md bg-gray-50">
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{codigo}</h1>
                <p className="text-lg text-gray-600 mb-6">{created_at}</p>
                <button
                    className="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 transition duration-300"
                    onClick={() => window.history.back()}
                >
                    Volver
                </button>
            </div>
        //</AuthenticatedLayout>
    );
};

export default MuestraDetalles;
