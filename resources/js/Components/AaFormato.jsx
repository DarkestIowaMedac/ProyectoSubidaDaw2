import { useState, useEffect } from 'react';

export function Aaformato( value, change ){

    const [formatos, setformatos] = useState([]);

    const fetchMuestras = async () => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/formatos');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            setformatos(datos);
            console.log(datos);
        } catch (error) {
            console.error('Error fetching formatos:', error);
            alert('Error al cargar las formatos. Por favor, intenta de nuevo más tarde.');
        }
    };

    // Llama a fetchMuestras cuando el componente se monte
    useEffect(() => {
        fetchMuestras();
    }, []); // El array vacío asegura que se ejecute solo una vez al montar el componente
    

    return(
        <>

            <label for="formato">Formatos:</label>
            <select id="formato" name="formato" value={value} onChange={change} required>

                <option value="">Selecciona una formato</option>

                {
                    formatos.map((formato)=>(
                        <option key={formato.id} value={formato.id}>{formato.nombre}</option>
                    ))
                }

            </select>

        </>
    )
}