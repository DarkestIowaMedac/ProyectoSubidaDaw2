import React, { useEffect, useState } from 'react';

const AaInterpretacion = ({muestraId, interpretaciones, setInterpretaciones}) => {

    const addInterpretacion = () => {
        setInterpretaciones([...interpretaciones, { texto: '' }]); // Agregar un nuevo campo de texto
    };

    const removeInterpretacion = (index) => {
        const newInterpretaciones = interpretaciones.filter((_, i) => i !== index); // Quitar el campo de texto correspondiente
        setInterpretaciones(newInterpretaciones);
    };

    const cambioInterpretacion = (index, event) => {
        const newInterpretaciones = [...interpretaciones];
        newInterpretaciones[index].texto = event.target.value; // Actualizar el texto en el índice correspondiente
        setInterpretaciones(newInterpretaciones);
    };

    useEffect(() => {
        // Fetch interpretations from the database
        if(muestraId != -1) {
        console.log(muestraId);
        fetch(`/ProyectoSubidaDaw2/public/muestras/${muestraId}/interpretaciones`)
            .then(response => response.json())
            .then(data => {
                setInterpretaciones(data);
                console.log("interpretaciones"+data);
            })
            .catch(error => {
                console.error('Ha habido un error extrayendo las interpretaciones', error);
            });
        }
    }, []);

    return (
        <div className="space-y-4">
            <h2 className="text-lg font-semibold text-gray-300">Interpretaciones</h2>

            {Array.isArray(interpretaciones) && interpretaciones.length > 0 ? (
                interpretaciones.map((interpretacion, index) => (
                    <div key={index} className="p-4 bg-gray-900 rounded-lg shadow-md border border-gray-700">
                        <label htmlFor={`interpretacion-${index}`} className="text-gray-300 font-medium block mb-2">
                            Interpretación {index + 1}:
                        </label>
                        <textarea
                            id={`interpretacion-${index}`}
                            value={interpretacion.texto}
                            name="texto"
                            onChange={(event) => cambioInterpretacion(index, event)}
                            required
                            className="w-full p-3 border border-gray-700 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="3"
                            placeholder="Escribe la interpretación..."
                        />
                        <div className="flex justify-end gap-2 mt-3">
                            <button
                                type="button"
                                onClick={() => removeInterpretacion(index)}
                                className="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg transition duration-300"
                            >
                                Quitar
                            </button>
                            <button
                                type="button"
                                onClick={addInterpretacion}
                                className="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg transition duration-300"
                            >
                                Añadir otra
                            </button>
                        </div>
                    </div>
                ))
            ) : (
                <div className="text-center">
                    <p className="text-gray-400 mb-2">No hay interpretaciones disponibles.</p>
                    <button
                        type="button"
                        onClick={addInterpretacion}
                        className="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300"
                    >
                        Añadir una interpretación
                    </button>
                </div>
            )}
        </div>
    );
    };

export default AaInterpretacion;
