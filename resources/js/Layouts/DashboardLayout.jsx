import { useState } from 'react';

export function DashboardLayout (){

    const [muestras, setMuestras] = useState([]);

    fetch('/ProyectoSubidaDaw2/public/muestras')
    .then(respuesta => respuesta.json())
    .then(datos => {
        setMuestras(datos)
    })

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
    };

    const handleDelete = (id) => {
        if (window.confirm(`¿Estás seguro de que deseas eliminar la muestra con ID ${id}?`)) {
            borrarMuestra(id); // Llama a la función para eliminar la muestra
        }
    };

    return(
        <>
            {
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
                        >
                            Ver muestra
                        </button>

                        <button 
                            className='bg-blue-500 text-white p-3 rounded mr-4'
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
            }
            
        </>
    )
}