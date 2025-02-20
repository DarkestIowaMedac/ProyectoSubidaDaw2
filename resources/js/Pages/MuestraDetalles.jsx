import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

const MuestraDetalles = ({ muestra }) => {
    // Asegúrate de que 'muestra' sea un objeto con las propiedades 'nombre' y 'descripcion'
    const { id, updated_at, created_at, user_id, sede_id, formato_id, codigo } = muestra;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const [sede, setSede] = useState();
    const [formato, setFormato] = useState();
    const [imagenes, setImagenes] = useState([]);
    const [interpretaciones, setInterpretaciones] = useState([]);

    const fetchSede = async (sede_id) => {
        try {
            console.log("se llega")
            const response = await fetch(`/ProyectoSubidaDaw2/public/sede/${sede_id}`);
            if (!response.ok) {
                throw new Error('Error al obtener la sede');
            }
            const data = await response.json();
            console.log("los datos son: " + data)
            setSede(data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchFormato = async (formarto_id) => {
        try {
            const response = await fetch(`/ProyectoSubidaDaw2/public/formato/${formato_id}`);
            if (!response.ok) {
                throw new Error('Error al obtener el formato');
            }
            const data = await response.json();
            setFormato(data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchInterpretaciones = async (id) => {
        try {
            const response = await fetch(`/ProyectoSubidaDaw2/public/muestras/${id}/interpretaciones`);
            if (!response.ok) {
                throw new Error('Error al obtener las interpretaciones');
            }
            const data = await response.json();
            setInterpretaciones(data); // Almacena las interpretaciones en el estado
        } catch (error) {
            console.error(error);
        }
    };

    const fetchImages = async (id) => {
        try {
            const response = await fetch(`/ProyectoSubidaDaw2/public/muestras/${id}/imagenes`, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });
            if (!response.ok) {
                throw new Error('Error al obtener imágenes');
            }
            const data = await response.json();
            // Establecer las imágenes en el estado
            setImagenes(data); // Ajusta según la estructura de tu respuesta
        } catch (error) {
            console.error(error);
            setErrorMessage("No se pudieron cargar las imágenes.");
        }
    };

    useEffect(() => {
        console.log("sede_id:", sede_id);

        console.log("formato_id:", formato_id);
        fetchSede(sede_id);
        fetchFormato(formato_id);
        fetchImages(id)
        fetchInterpretaciones(id)
    }, []);

    // Función para generar el PDF
    const generarPDF = () => {
        window.open(`/ProyectoSubidaDaw2/public/generate-pdf/${id}`, '_blank'); // Abre el PDF en una nueva pestaña
    };

    return (
        <div className="max-w-3xl mx-auto p-6 border border-gray-600 rounded-lg shadow-lg bg-gray-900">
            <h1 className="text-4xl font-extrabold text-white mb-8 text-center bg-gradient-to-r from-blue-400 to-purple-500 text-transparent bg-clip-text">
            Detalles de la Muestra
        </h1>

        {/* Información General */}
        <div className="grid grid-cols-1 sm:grid-cols-2 gap-6 text-white border-b border-gray-700 pb-6">
            <p className="text-lg font-semibold text-gray-400">Código: <span className="font-normal text-white">{codigo}</span></p>
            <p className="text-lg font-semibold text-gray-400">ID Muestra: <span className="font-normal text-white">{id}</span></p>
            <p className="text-lg font-semibold text-gray-400">Usuario ID: <span className="font-normal text-white">{user_id}</span></p>
            <p className="text-lg font-semibold text-gray-400">Última actualización: <span className="font-normal text-white">{updated_at}</span></p>
        </div>
        <p className="text-lg font-semibold text-gray-400">Creado el: <span className="font-normal text-white">{created_at}</span></p>

        {/* Información de Sede */}
        {sede ? (
            <div className="mt-6 p-5 border border-gray-700 rounded-lg bg-gray-800 shadow-md">
                <h2 className="text-2xl font-bold text-white mb-3">Información de la Sede</h2>
                <p className="text-lg font-semibold text-gray-400">Sede ID: <span className="font-normal text-white">{sede_id}</span></p>
                <p className="text-lg font-semibold text-gray-400">Nombre: <span className="font-normal text-white">{sede?.nombre}</span></p>
                <p className="text-lg font-semibold text-gray-400">Código: <span className="font-normal text-white">{sede?.codigo}</span></p>
            </div>
        ) : (
            <p className="text-gray-400 mt-4">Cargando sede...</p>
        )}

        {/* Información de Formato */}
        {formato ? (
            <div className="mt-6 p-5 border border-gray-700 rounded-lg bg-gray-800 shadow-md">
                <h2 className="text-2xl font-bold text-white mb-3">Formato</h2>
                <p className="text-lg font-semibold text-gray-400">Formato ID: <span className="font-normal text-white">{formato_id}</span></p>
                <p className="text-lg font-semibold text-gray-400">Nombre: <span className="font-normal text-white">{formato?.nombre}</span></p>
            </div>
        ) : (
            <p className="text-gray-400 mt-4">Cargando formato...</p>
        )}

        {/* Interpretaciones */}
        <div className="mt-6 p-5 border border-gray-700 rounded-lg bg-gray-800 shadow-md">
            <h2 className="text-2xl font-bold text-white mb-3">Interpretaciones</h2>
            {interpretaciones.length > 0 ? (
                <ul className="list-disc pl-6 text-white space-y-2">
                    {interpretaciones.map((interpretacion) => (
                        <li key={interpretacion.id}>{interpretacion.texto}</li>
                    ))}
                </ul>
            ) : (
                <p className="text-gray-400">No hay interpretaciones disponibles.</p>
            )}
        </div>

            {/* Imágenes */}
            <div className="mt-6">
                <h2 className="text-xl font-bold text-white mb-2">Imágenes</h2>
                {imagenes.length > 0 ? (
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                        {imagenes.map((imagen) => (
                            <div key={imagen.id} className="border border-gray-700 rounded-full overflow-hidden shadow-md hover:shadow-lg transition flex items-center justify-center w-40 h-40">
                                <img src={imagen.ruta} alt={`Imagen ${imagen.id}`} className="w-full h-full object-cover rounded-full" />
                            </div>
                        ))}
                    </div>
                ) : (
                    <p className="text-gray-400">No hay imágenes disponibles.</p>
                )}
            </div>

            {/* Botones */}
            <div className="mt-8 flex flex-wrap justify-between">
                <button
                    className="flex items-center gap-2 px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-500 transition duration-300"
                    onClick={generarPDF}
                >
                    Generar PDF
                </button>

                <button
                    className="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300"
                    onClick={() => window.history.back()}
                >
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
                        <path d="M480-120 120-480l360-360 42 42-278 278h716v60H244l278 278-42 42Z" />
                    </svg>
                    Volver
                </button>
            </div>

        </div>
    );

}

export default MuestraDetalles;
