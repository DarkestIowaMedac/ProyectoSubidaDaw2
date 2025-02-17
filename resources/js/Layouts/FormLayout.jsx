import React from 'react';
import { useState, useEffect } from 'react';
import { AaSede } from '@/Components/AaSede';
import { AaFormato } from '@/Components/AaFormato';

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

    //! Estado para los datos del formulario
    const [formData, setFormData] = useState({
        codigo: '',
        fecha: '',
        user_id: '',
        sede_id: '',
        formato_id: '',
    });

    const obtenerId = async() => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/user/id');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            return(datos)
        } catch (error) {
            console.error('Error fetching formatos:', error);
            alert('Error al cargar los formatos. Por favor, intenta de nuevo más tarde.');
            return null
        }
    }

    // useEffect para obtener el user_id al montar el componente
    useEffect(() => {
        const fetchUserId = async () => {
            const userData = await obtenerId(); // Llama a la función asíncrona
            if (userData) {
                setFormData((prevFormData) => ({
                    ...prevFormData,
                    user_id: userData.user_id, // Actualiza el estado con el user_id obtenido
                }));
            }
        };

        fetchUserId(); // Ejecuta la función
    }, []); // Solo se ejecuta una vez al montar el componente


    //! Efecto para inicializar los valores del formulario si hay una muestra anterior
    useEffect(() => {
        if (muestraAnterior) {
            setFormData({
                codigo: muestraAnterior.codigo || '',
                fecha: muestraAnterior.fecha || '',
                user_id: muestraAnterior.user_id || '',
                sede_id: muestraAnterior.sede_id || '',
                formato_id: muestraAnterior.formato_id || '',
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

        console.log('Datos enviados:', formData);

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

                <label htmlFor="codigo">Código:</label><br />
                <input
                    className="text-black"
                    type="text"
                    id="codigo"
                    name="codigo"
                    placeholder="Escribe tu codigo"
                    value={formData.codigo} // Valor controlado
                    onChange={handleChange} // Manejar cambios
                    required
                />
                <br /><br />

                <label htmlFor="fecha">Fecha:</label><br />
                <input
                    className="text-black"
                    type="date"
                    id="fecha"
                    name="fecha"
                    value={formData.fecha} // Valor controlado
                    onChange={handleChange} // Manejar cambios
                    required
                />

                <br /><br />

                <AaSede
                    value={formData.sede_id}
                    onChange={handleChange}
                />

                <br /><br />

                <AaFormato
                    value={formData.formato_id}
                    onChange={handleChange}
                />

                <br /><br />

                <button type="submit" className="bg-green-500 text-white p-3 rounded">
                    {muestraAnterior ? 'Actualizar' : 'Crear'} {/* Cambia el texto del botón */}
                </button>
            </form>
        </>
    );
}
