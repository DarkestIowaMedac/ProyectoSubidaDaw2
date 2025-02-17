import { useState, useEffect } from 'react';

export function AaSede({ value, onChange }) {
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

    useEffect(() => {
        fetchMuestras();
    }, []);

    return (
        <>
            <label htmlFor="sede_id">Sedes:</label>
            <select id="sede_id" name="sede_id" value={value} onChange={onChange} required>
                <option value="">Selecciona una sede</option>
                {sedes.map((sede) => (
                    <option key={sede.id} value={sede.id}>
                        {sede.nombre}
                    </option>
                ))}
            </select>
        </>
    );
}