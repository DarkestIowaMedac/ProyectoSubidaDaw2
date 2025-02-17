import { useState, useEffect } from 'react';

export function AaSede( value, change){

    const [sedes, setSedes] = useState([]);

    const fetchMuestras = async () => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/sedes');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            setSedes(datos);
            console.log(datos);
        } catch (error) {
            console.error('Error fetching sedes:', error);
            alert('Error al cargar las sedes. Por favor, intenta de nuevo más tarde.');
        }
    };

    // Llama a fetchMuestras cuando el componente se monte
    useEffect(() => {
        fetchMuestras();
    }, []); // El array vacío asegura que se ejecute solo una vez al montar el componente
    

    return(
        <>

            <label for="sede">Sedes:</label>
            <select id="sede" name="sede" value={value} onChange={change} required>

                <option value="">Selecciona una sede</option>

                {
                    sedes.map((sede)=>(
                        <option key={sede.id} value={sede.id}>{sede.nombre}</option>
                    ))
                }

            </select>

        </>
    )
}