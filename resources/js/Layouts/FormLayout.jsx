import React from 'react';
import { useState, useEffect } from 'react';
import { AaSede } from '@/Components/AaSede';
import { AaFormato } from '@/Components/AaFormato';
import { AaImagen } from '@/Components/AaImagen';
import AaInterpretacion from '@/Components/AaInterpretacion';

export function FormLayout() {

//----- Interpretaciones y métodos --------------------------------------------------------
const [interpretaciones, setInterpretaciones] = useState([
        {texto: ''}
    ]);

const [images, setImages] = useState([]);

const borrarInterpretaciones = async (muestraId) => {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const response = await fetch(`/ProyectoSubidaDaw2/public/borrarinterpretaciones/${muestraId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        if (response.ok) {
            alert('Interpretaciones eliminadas exitosamente');
            // Aquí puedes actualizar el estado de las interpretaciones si es necesario
        } else {
            const errorData = await response.json();
            console.error('Error al eliminar las interpretaciones:', errorData);
            alert('Error al eliminar las interpretaciones: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        alert('Error al realizar la solicitud para eliminar interpretaciones');
    }
};

const borrarImagenes = async (muestraId) => {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch(`/ProyectoSubidaDaw2/public/borrarimagenes/${muestraId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        });
        if (response.ok) {
            alert('Imágenes eliminadas exitosamente');
            // Aquí puedes actualizar el estado de las imágenes si es necesario
            setImages([]); // Por ejemplo, limpiar el estado de las imágenes
        } else {
            const errorData = await response.json();
            console.error('Error al eliminar las imágenes:', errorData);
            alert('Error al eliminar las imágenes: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        alert('Error al realizar la solicitud para eliminar imágenes');
    }
};

//----- Función para obtener la muestra de la cookie --------------------------------------------------

    const obtenerMuestraDeCookie = () => {
        const cookies = document.cookie.split('; ');
        const muestraCookie = cookies.find((cookie) => cookie.startsWith('muestra='));
        deleteAllCookies();
        if (muestraCookie) {
            const muestraJSON = muestraCookie.split('=')[1];
            return JSON.parse(muestraJSON);
        }
        return null;
    };


//----- Función para borrar todas las cookies --------------------------------------------------------

    function deleteAllCookies() {
        const cookies = document.cookie.split(";");
        for (let cookie of cookies) {
            const cookieName = cookie.split("=")[0].trim();
            document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/`;
        }
    }

    const [muestraAnterior, setMuestraAnterior] = useState(obtenerMuestraDeCookie());

    const [formData, setFormData] = useState({
        codigo: '',
        fecha: '',
        user_id: '',
        sede_id: '',
        formato_id: '',
    });

    //const [imageUrls, setImageUrls] = useState([]); // Estado para almacenar las URLs de las imágenes

    const obtenerId = async () => {
        try {
            const response = await fetch('/ProyectoSubidaDaw2/public/user/id');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const datos = await response.json();
            return datos;
        } catch (error) {
            console.error('Error fetching formatos:', error);
            alert('Error al cargar los formatos. Por favor, intenta de nuevo más tarde.');
            return null;
        }
    };

    useEffect(() => {
        const fetchUserId = async () => {
            const userData = await obtenerId();
            if (userData) {
                setFormData((prevFormData) => ({
                    ...prevFormData,
                    user_id: userData.user_id,
                }));
            }
        };

        fetchUserId();
    }, []);


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


    const handleChange = (event) => {
        const { name, value } = event.target;
        setFormData({ ...formData, [name]: value });
    };


//----- Manejar el envío del formulario -------------------------------------------------------------

const handleSubmit = async (event) => {
    event.preventDefault();

    console.log('Datos enviados:', formData);

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const url = muestraAnterior
            ? `/ProyectoSubidaDaw2/public/actualizarmuestra/${muestraAnterior.id}`
            : '/ProyectoSubidaDaw2/public/crearmuestra';

        const method = muestraAnterior ? 'PUT' : 'POST';

        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(formData),
        });

        const responseData = await response.json(); // Obtener el ID de la muestra creada

        //----- Subida de imágenes --------------------------------------------------
        if (response.ok) {
            const muestraId = responseData.id; // Asegúrate de que tu API devuelva el ID de la muestra
            console.log(muestraId)
            await borrarImagenes(muestraId); // Asegúrate de que esta función sea asíncrona

            // Ahora sube las imágenes a la ruta /crearimagenes/{muestra_id}
            if (images.length > 0) {
                const imagesToSend = images.map(image => ({
                    muestra_id: muestraId,
                    ruta: image.ruta, // Asegúrate de que esto sea la URL de la imagen
                    zoom: image.zoom // Asegúrate de que esto sea el zoom deseado
                }));

                console.log("Imagenes to send:");
                console.log(imagesToSend);

                const imageResponse = await fetch(`/ProyectoSubidaDaw2/public/crearimagenes/${muestraId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ imagenes: imagesToSend }), // Envía las URLs de las imágenes
                });
                console.log("Respuesta de la API de imágenes:", imageResponse);
                if (imageResponse.ok) {
                    alert('Imágenes subidas exitosamente');
                } else {
                    const errorData = await imageResponse.json();
                    console.error('Error al subir las imágenes:', errorData);
                    alert('Error al subir las imágenes: ' + errorData.message);
                }
            }

            //----- Borrar interpretaciones y subir nuevas --------------------------------------------------
            await borrarInterpretaciones(muestraId); // Asegúrate de que esta función sea asíncrona

            if (interpretaciones.length > 0) {
                const interpretacionesToSend = interpretaciones.map(inter => ({
                    muestra_id: muestraId,
                    texto: inter.texto, // Asegúrate de que esto sea el texto de la interpretación
                }));

                console.log("Interpretaciones to send:");
                console.log(interpretacionesToSend);

                const interpretacionResponse = await fetch(`/ProyectoSubidaDaw2/public/muestras/${muestraId}/interpretaciones`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ interpretaciones: interpretacionesToSend }), // Envía las interpretaciones
                });

                if (interpretacionResponse.ok) {
                    alert('Interpretaciones subidas exitosamente');
                } else {
                    const errorData = await interpretacionResponse.json();
                    console.error('Error al subir las interpretaciones:', errorData);
                    alert('Error al subir las interpretaciones: ' + errorData.message);
                }
            }

            alert(
                muestraAnterior
                    ? 'Muestra actualizada exitosamente'
                    : 'Muestra creada exitosamente'
            );
            window.history.back();
        } else {
            const errorData = await response.json();
            console.error('Error al procesar la solicitud:', errorData);
            alert('Error al procesar la solicitud: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al enviar los datos');
    }
};
    const idComponent = muestraAnterior ? muestraAnterior.id : -1;
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
                    value={formData.codigo}
                    onChange={handleChange}
                    required
                />
                <br /><br />

                <label htmlFor="fecha">Fecha:</label><br />
                <input
                    className="text-black"
                    type="date"
                    id="fecha"
                    name="fecha"
                    value={formData.fecha}
                    onChange={handleChange}
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

                <AaImagen images={images} setImages={setImages} muestraId={idComponent} /> {/* Pasa la función para actualizar las URLs de las imágenes */}

                <br /><br />

                <AaInterpretacion muestraId={idComponent} interpretaciones={interpretaciones} setInterpretaciones={setInterpretaciones} />

                <br /><br />

                <button type="submit" className="bg-green-500 text-white p-3 rounded">
                    {muestraAnterior ? 'Actualizar' : 'Crear'}
                </button>
            </form>
        </>
    );
}
