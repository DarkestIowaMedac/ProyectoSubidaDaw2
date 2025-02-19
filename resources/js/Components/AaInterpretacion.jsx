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
            <div>
                {
                    Array.isArray(interpretaciones) && interpretaciones.length > 0 ? (
                    interpretaciones.map((interpretacion, index) => (
                        <div key={index} className='interpretacion'>

                            <label htmlFor="texto">
                                Interpretación:
                            </label>
                            <br />
                            <textarea
                                value={interpretacion.texto}
                                name="texto"
                                onChange={(event) => cambioInterpretacion(index, event)}
                                required
                            />
                            <br />
                            <button
                                type="button"
                                onClick={() => removeInterpretacion(index)}
                                className="bg-gray-400 text-white p-1 rounded"
                            >Quitar</button>
                            <br />

                            <button
                                type="button"
                                onClick={addInterpretacion}
                                className="bg-gray-400 text-white p-1 rounded"
                            >Añadir otra interpretación</button>
                        </div>
                    ))
                ) : (
                    <div>

                    <p>No hay interpretaciones disponibles.</p>

                    <button
                        type="button"
                        onClick={addInterpretacion} // Llama a la función para añadir una nueva interpretación
                        className="bg-blue-500 text-white p-2 rounded"
                    >
                        Añadir una interpretación
                    </button>

                </div>
                )
                }


            </div>
        );
    };

export default AaInterpretacion;
