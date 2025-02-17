import { useState } from 'react';
import MuestraDetalles from "../pages/MuestraDetalles"
import { useEffect } from 'react';
import Formulario from "../pages/Formulario"
import { FormLayout } from './FormLayout';
export function DashboardLayout() {

    const [muestras, setMuestras] = useState([]);
    const [muestraDetalle, setMuestraDetalle] = useState(null);
    const [refrescar, setRefrescar] = useState(false); // Estado para controlar el re-fetch
    const [paginaActual, setPaginaActual] = useState(window.location.pathname);

    const fetchMuestras = async () => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/muestras');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            setMuestras(datos);
            console.log(datos);
        } catch (error) {
            console.error('Error fetching muestras:', error);
            alert('Error al cargar las muestras. Por favor, intenta de nuevo más tarde.');
        }
    };


    useEffect(() => {
        fetchMuestras(); // Llama a la función para obtener las muestras al montar el componente
    }, [refrescar]); // Se ejecuta cada vez que refrescar cambia// Solo se ejecuta una vez al montar el componente

    useEffect(() => {
        const handlePopState = () => {
            setPaginaActual(window.location.pathname);
        };

        window.addEventListener('popstate', handlePopState);

        return () => {
            window.removeEventListener('popstate', handlePopState);
        };
    }, []);

    //-- BORRAR ---------------------------------------------------------------------

    const borrarMuestra = async (id) => {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtén el token CSRF del meta tag

            const response = await fetch(`/ProyectoSubidaDaw2/public/borrarmuestra/${id}`, {
                method: 'DELETE', // Método DELETE para eliminar
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Incluye el token CSRF en los encabezados
                },
            });

            if (response.ok) {
                console.log(`Muestra con ID ${id} eliminada exitosamente.`);
            } else {
                alert(`Error al eliminar la muestra con ID ${id}.`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al intentar eliminar la muestra.');
        }
        setRefrescar(true)
    };

    const handleDelete = (id) => {
        if (window.confirm(`¿Estás seguro de que deseas eliminar la muestra con ID ${id}?`)) {
            borrarMuestra(id); // Llama a la función para eliminar la muestra
        }
    };

    //--  VER   ----------------------------------------------------------

    const verMuestra = async (id) => {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const response = await fetch(`/ProyectoSubidaDaw2/public/muestra/${id}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });
            if (response.ok) {
                const muestraData = await response.json();
                setMuestraDetalle(muestraData); // Almacena la muestra en el estado
                window.history.pushState({}, '', `/ProyectoSubidaDaw2/public/dashboard`); // Cambia la URL sin recargar
            } else {
                alert(`Error al visualizar la muestra con ID ${id}.`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al visualizar la muestra.');
        }
    };

    //-- EDITAR ----------------------------------------------------------

    const almacenarMuestraEnCookie = (muestra) => {
        const muestraJSON = JSON.stringify(muestra); // Convierte el objeto en una cadena JSON
        document.cookie = `muestra=${muestraJSON}; path=/; max-age=60`; // Almacena la cookie con una duración de 1 min
    };

    const editarMuestra = (muestra) => {
        almacenarMuestraEnCookie(muestra);
        //window.location.href = '/ProyectoSubidaDaw2/public/formulario'; // Redirección manual
        window.history.pushState({}, '', `/ProyectoSubidaDaw2/public/dashboard`);
        //setRefrescar(true)
        setPaginaActual(`/ProyectoSubidaDaw2/public/formulario`);
    }
    const renderizarPagina = () => {
        switch (paginaActual) {
            case '/ProyectoSubidaDaw2/public/formulario':
                return <FormLayout />;

            default:
                return (
                    <div className="container mx-auto px-4">
                        {muestraDetalle ? (
                            <MuestraDetalles muestra={muestraDetalle} />
                        ) : (
                            <div
                                className="grid gap-6 
                sm:grid-cols-1 
                md:grid-cols-1 
                lg:grid-cols-2"
                            >
                                {muestras.map((muestra) => (
                                    <div
                                        key={muestra.id}
                                        id={muestra.id}
                                        className="p-5 bg-gray-800 rounded-lg shadow-lg border border-gray-700 h-full flex flex-col"
                                    >
                                        {/* Título */}
                                        <h1 className="text-lg font-bold text-white mb-2">
                                            {muestra.id}. {muestra.nombre}
                                        </h1>

                                        {/* Descripción */}
                                        <h2 className="text-gray-300 mb-4 text-sm sm:text-base flex-grow">
                                            {muestra.descripcion}
                                        </h2>

                                        {/* Botones pegados abajo */}
                                        <div className="flex flex-wrap gap-4 mt-auto justify-center items-center">
                                            <button
                                                className="bg-gray-600 hover:bg-gray-500 text-white px-5 py-2 rounded-md transition flex items-center gap-2"
                                                onClick={() => verMuestra(muestra.id)}
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                    <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                                                </svg>
                                                Ver
                                            </button>

                                            <button
                                                className="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md transition flex items-center gap-2"
                                                onClick={() => editarMuestra(muestra)}
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                    <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                                </svg>
                                                Editar
                                            </button>

                                            <button
                                                className="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md transition flex items-center"
                                                onClick={() => handleDelete(muestra.id)}
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" /></svg>
                                            </button>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        )}
                    </div>
                )
        }
    }
    return (
        <div>
            {renderizarPagina()}
        </div>
    )
}
