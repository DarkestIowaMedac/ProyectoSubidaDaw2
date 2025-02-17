import { useState, useEffect } from 'react';

export function AaFormato({ value, onChange }) {
    const [formatos, setFormatos] = useState([]);

    const fetchMuestras = async () => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/formatos');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            setFormatos(datos);
            console.log(datos);
        } catch (error) {
            console.error('Error fetching formatos:', error);
            alert('Error al cargar los formatos. Por favor, intenta de nuevo más tarde.');
        }
    };

    useEffect(() => {
        fetchMuestras();
    }, []);

    return (
        <>
            <label htmlFor="formato_id">Formatos:</label>
            <select id="formato_id" name="formato_id" value={value} onChange={onChange} required>
                <option value="">Selecciona un formato</option>
                {formatos.map((formato) => (
                    <option key={formato.id} value={formato.id}>
                        {formato.nombre}
                    </option>
                ))}
            </select>
        </>
    );
}