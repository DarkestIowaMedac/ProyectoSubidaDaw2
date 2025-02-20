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
        } catch (error) {
            console.error('Error fetching formatos:', error);
            alert('Error al cargar los formatos. Por favor, intenta de nuevo más tarde.');
        }
    };

    useEffect(() => {
        fetchMuestras();
    }, []);

    return (
        <div className="relative flex flex-col space-y-2">
            <label htmlFor="formato_id" className="text-gray-300 font-semibold">
                Formatos:
            </label>
            <select
                id="formato_id"
                name="formato_id"
                value={value}
                onChange={onChange}
                required
                className="w-full p-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="" className="text-white">Selecciona un formato</option>
                {formatos.map((formato) => (
                    <option key={formato.id} value={formato.id} className="text-white">
                        {formato.nombre}
                    </option>
                ))}
            </select>
        </div>
    );
}