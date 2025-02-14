import { useState } from 'react';

export function DashboardLayout (){

    const [muestras, setMuestras] = useState([]);

    fetch('/ProyectoSubidaDaw2/public/muestras')
    .then(respuesta => respuesta.json())
    .then(datos => {
        setMuestras(datos)
    })

    

    return(
        <>
            {
                muestras.map((muestra)=>(
                    <div id={muestra.id} className=' pb-5'>
                        <h1 className='font-bold'>{muestra.id}. {muestra.nombre}</h1>
                        <h2>{muestra.descripcion}</h2>
                        <button className='bg-blue-500 text-white p-3 rounded mr-4'>Editar</button>
                        <button className='bg-green-500 text-white p-3 rounded'>Borrar</button>
                    </div>
                ))
            }
            
        </>
    )
}