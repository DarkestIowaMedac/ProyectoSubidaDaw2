import { useState } from 'react';
import MuestraDetalles from "../pages/MuestraDetalles"
import { useEffect } from 'react';
import Formulario from "../pages/Formulario"
import { FormLayout } from './FormLayout';
export function DashboardLayout (){

    const [muestras, setMuestras] = useState([]);
    const [muestraDetalle, setMuestraDetalle] = useState(null);
    const [refrescar, setRefrescar] = useState(0); // Estado para controlar el re-fetch
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
        setRefrescar(refrescar+1)
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
        window.history.pushState({}, '', `/ProyectoSubidaDaw2/public/formulario`);
        //setRefrescar(true)
        setPaginaActual(`/ProyectoSubidaDaw2/public/formulario`);
    }
    const renderizarPagina = () => {
    switch (paginaActual) {
        case '/ProyectoSubidaDaw2/public/formulario':
            return <FormLayout />;

    default:
    return (
        <div className='container mx-auto'>


            {muestraDetalle ? (

                <MuestraDetalles muestra={muestraDetalle} /> // Renderiza MuestraDetalles si hay una muestra

            ) : (
                muestras.map((muestra)=>(
                    <div key={muestra.id} id={muestra.id} className=' pb-5'>
                        <h1 className='font-bold'>
                            {muestra.id}. {muestra.nombre}
                        </h1>

                        <h2>
                            {muestra.descripcion}
                        </h2>

                        <button
                            className='bg-gray-500 text-white p-3 rounded mr-4'
                            onClick={()=>verMuestra(muestra.id)}
                        >
                            Ver muestra
                        </button>

                        <button
                            className='bg-blue-500 text-white p-3 rounded mr-4'
                            onClick={()=>editarMuestra(muestra)}
                        >
                            Editar
                        </button>

                        <button
                            className='bg-green-500 text-white p-3 rounded'
                            onClick={()=>handleDelete(muestra.id)}
                        >
                            Borrar
                        </button>
                    </div>
                ))
            )}
        </div>
    )}
    }
    return (
        <div>
            {renderizarPagina()}
        </div>
    )
}
