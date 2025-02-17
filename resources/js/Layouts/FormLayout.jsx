import React from 'react';
import { useState, useEffect } from 'react';
import { AaFecha } from '@/Components/AaFecha';
import { AaCodigo } from '@/Components/AaCodigo';

export function FormLayout() {
    // Función para obtener la muestra de la cookie
    const obtenerMuestraDeCookie = () => {

        const cookies = document.cookie.split('; '); // Divide las cookies en un array

        const muestraCookie = cookies.find((cookie) => cookie.startsWith('muestra='));

        deleteAllCookies();

        if (muestraCookie) {
            const muestraJSON = muestraCookie.split('=')[1]; // Obtiene el valor de la cookie
            return JSON.parse(muestraJSON); // Convierte la cadena JSON de vuelta a un objeto
        }
        return null; // Si no se encuentra la cookie, devuelve null
    };

    function deleteAllCookies() {
        // Obtener todas las cookies
        const cookies = document.cookie.split(";");
        // Recorrer cada cookie y eliminarla
        for (let cookie of cookies) {
            const cookieName = cookie.split("=")[0].trim();
            // Establecer la cookie con una fecha de expiración en el pasado
            document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
        }
    }


    // Estado para la muestra anterior
    const [muestraAnterior, setMuestraAnterior] = useState(obtenerMuestraDeCookie());

    //! ESTADO PARA LOS DATOS DEL FORMMULARIO
    const [formData, setFormData] = useState({
        fecha: '',
        codigo: '',
    });

    //! Efecto para inicializar los valores del formulario si hay una muestra anterior
    useEffect(() => {
        if (muestraAnterior) {
            setFormData({
                fecha: muestraAnterior.fecha || '',
                codigo: muestraAnterior.codigo || '',
            });
        }
    }, [muestraAnterior]);


    // Manejar cambios en los campos del formulario
    const handleChange = (event) => {
        const { name, value } = event.target;
        setFormData({ ...formData, [name]: value });
    };


    // Manejar el envío del formulario
    const handleSubmit = async (event) => {
        event.preventDefault();

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtén el token CSRF del meta tag

            // Determinar la URL de la solicitud
            const url = muestraAnterior
                ? `/ProyectoSubidaDaw2/public/actualizarmuestra/${muestraAnterior.id}`
                : '/ProyectoSubidaDaw2/public/crearmuestra';

            const method = muestraAnterior ? 'PUT' : 'POST'; // Cambiar el método según la acción

            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Incluye el token CSRF en los encabezados
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                alert(
                    muestraAnterior
                        ? 'Muestra actualizada exitosamente'
                        : 'Muestra creada exitosamente'
                );
                // Redirige al usuario a la vista Dashboard
                //window.location.href = '/ProyectoSubidaDaw2/public/dashboard'; // Redirección manual
                window.history.back()
            } else if (response.status === 419) {
                alert('Error 419: Token CSRF inválido o ausente.');
            } else {
                alert('Error al procesar la solicitud');
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

                <AaFecha 
                    change={handleChange}
                    value={formData.fecha}
                ></AaFecha>

                <br /><br />

                <AaCodigo
                    change={handleChange}
                    value={formData.codigo}
                />

                <br /><br />

                <button type="submit" className="bg-green-500 text-white p-3 rounded">
                    {muestraAnterior ? 'Actualizar' : 'Crear'} {/* Cambia el texto del botón */}
                </button>
            </form>
        </>
    );
}
