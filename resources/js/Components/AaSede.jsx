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
        } catch (error) {
            console.error('Error fetching sedes:', error);
            alert('Error al cargar las sedes. Por favor, intenta de nuevo más tarde.');
        }
    };

    useEffect(() => {
        fetchMuestras();
    }, []);

    return (
        <div className="flex flex-col space-y-2">
            <label htmlFor="sede_id" className="text-white font-semibold">
                Sedes:
            </label>
            <select
                id="sede_id"
                name="sede_id"
                value={value}
                onChange={onChange}
                required
                className="w-full p-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="" className="text-white">Selecciona una sede</option>
                {sedes.map((sede) => (
                    <option key={sede.id} value={sede.id} className="text-white">
                        {sede.nombre}
                    </option>
                ))}
            </select>
        </div>
    );
    
}