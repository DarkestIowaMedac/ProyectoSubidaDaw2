import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';

const MuestraDetalles = ({ muestra }) => {
    // Asegúrate de que 'muestra' sea un objeto con las propiedades 'nombre' y 'descripcion'
    const { id, updated_at, created_at, user_id,sede_id, formato_id, codigo} = muestra;
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
            console.log("los datos son: "+data)
            setSede(data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchFormato = async (formarto_id) => {
        try {
            const response = await fetch(`/ProyectoSubidaDaw2/public/formato/${id}`);
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
            const response = await fetch(`/ProyectoSubidaDaw2/public/muestras/${id}/imagenes`,{
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
        //<AuthenticatedLayout>
            <div className="max-w-2xl mx-auto p-6 border border-gray-300 rounded-lg shadow-md bg-gray-50">
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{codigo} codigomuestra</h1>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{id} idmuestra</h1>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{user_id} usuarioid</h1>
                {sede ? (
                <>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{sede_id}  sedeId</h1>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{sede.nombre}  sedeNombre</h1>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{sede.codigo}  sedeCodigo</h1>
                </>
                ) : (
                <p>Cargando sede...</p>
                )}

                {formato ? (
                <>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{formato_id} formatoid</h1>
                <h1 className="text-2xl font-bold text-gray-800 mb-4">{formato.nombre} formatonombre</h1>
                </>
                ) : (
                <p>Cargando formato...</p>
                )}


                <h1 className="text-2xl font-bold text-gray-800 mb-4">{updated_at} updated at</h1>
                {interpretaciones.length > 0 ? (

                <ul>
                {interpretaciones.map((interpretacion) => (
                <li key={interpretacion.id} className="text-gray-700 mb-2">
                    {interpretacion.texto} descripciones{/* Asegúrate de que 'texto' sea la propiedad correcta */}
                </li>
                ))}
                </ul>
                ) : (
                <p>No hay interpretaciones disponibles.</p>
                )}

                <h2 className="text-xl font-bold text-gray-800 mb-4">Imágenes:</h2>

                {imagenes.length > 0 ? (
                    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        {imagenes.map((imagen) => (
                            <div key={imagen.id} className="border rounded-lg overflow-hidden shadow-md">
                                <img src={imagen.ruta} alt={`Imagen ${imagen.id}`} className="w-full h-auto" />
                                <div className="p-2">
                    <p className="text-gray-700">{imagen.descripcion}</p> {/* Asegúrate de que 'descripcion' sea la propiedad correcta */}
                                </div>
                            </div>
                        ))}
                    </div>
                ) : (
                    <p>No hay imágenes disponibles.</p>
                )}
                <p className="text-lg text-gray-600 mb-6">{created_at} created at</p>
                
                {/* Botón para generar el PDF */}
                <button
                    className="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700 transition duration-300 mb-4"
                    onClick={generarPDF}
                >
                    Generar PDF
                </button>
                
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
