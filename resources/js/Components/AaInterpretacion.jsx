import React, { useEffect, useState } from 'react';

const AaInterpretacion = () => {
    const [interpretations, setInterpretations] = useState([]);

    useEffect(() => {
        // Fetch interpretations from the database
        fetch('/muestras/{muestra_id}/interpretaciones')
            .then(response => response.json())
            .then(data => {
                setInterpretations(data);
            })
            .catch(error => {
                console.error('There was an error fetching the interpretations!', error);
            });
    }, []);

    return (
        <div>
            <h1>Interpretations</h1>
            <ul>
                {interpretations.map((interpretation, index) => (
                    <li key={index}>{interpretation.text}</li>
                ))}
            </ul>
        </div>
    );
};

export default AaInterpretacion;
