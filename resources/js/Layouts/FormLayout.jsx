import React from 'react';

export function FormLayout() {
    const handleSubmit = async (event) => {
        event.preventDefault();

        const formData = {
            nombre: event.target.nombre.value,
            descripcion: event.target.descripcion.value,
        };

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtén el token CSRF del meta tag

            const response = await fetch('/ProyectoSubidaDaw2/public/crearmuestra', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Incluye el token CSRF en los encabezados
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                alert('Muestra creada exitosamente');
            } else if (response.status === 419) {
                alert('Error 419: Token CSRF inválido o ausente.');
            } else {
                alert('Error al crear la muestra');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al enviar los datos');
        }
    };

    return (
        <>
            <h1>Formulario de los cojones</h1>
            <br />
            <form onSubmit={handleSubmit}>
                <label htmlFor="nombre">Nombre:</label><br />
                <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required />
                <br /><br />

                <label htmlFor="descripcion">Texto:</label><br />
                <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Escribe un mensaje aquí..." required></textarea>
                <br /><br />

                <button type="submit" className="bg-green-500 text-white p-3 rounded">Enviar</button>
            </form>
        </>
    );
}