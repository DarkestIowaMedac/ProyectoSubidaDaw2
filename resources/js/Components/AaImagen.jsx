import { useState, useEffect } from 'react';

export function AaImagen({ onChange, muestraId, images, setImages }) {
    const CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/dbsxcnftm/image/upload';
    const UPLOAD_PRESET = 'presetbueno';

     // Para almacenar las imágenes con su URL y zoom
    const [isLoading, setIsLoading] = useState(false);
    const [errorMessage, setErrorMessage] = useState("");

    const aumentos = ["x4", "x10", "x40", "x100"];
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    //----- Función para obtener imágenes al montar el componente -------------------------------------------------------
    useEffect(() => {

        const fetchImages = async () => {
            try {
                if(muestraId != -1){

                    const response = await fetch(`/ProyectoSubidaDaw2/public/muestras/${muestraId}/imagenes`,{
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    });
                    if (!response.ok) {
                        throw new Error('Error al obtener imágenes');
                    }
                    const data = await response.json();
                    // Establecer las imágenes en el estado
                    setImages(data.map(img => ({ ruta: img.ruta, zoom: img.zoom }))); // Ajusta según la estructura de tu respuesta
                    }
            } catch (error) {
                console.error(error);
                setErrorMessage("No se pudieron cargar las imágenes.");
            }
        };


            fetchImages();

    }, [muestraId]);

    //----- Función que maneja la carga de imágenes -------------------------------------------------------
    const urlImages = async (e) => {
        console.log("urlImages ha sido llamado");
        console.log("Archivos seleccionados:", e.target.files);
        setIsLoading(true);
        setErrorMessage(""); // Limpiar cualquier error previo

        let existingImages = [...images];
        let newImages = Array.from(e.target.files);
        const uploadedImages = [];

        for (const archivo of newImages) {
            const formData = new FormData();
            formData.append('file', archivo);
            formData.append('upload_preset', UPLOAD_PRESET);

            try {
                const response = await fetch(CLOUDINARY_URL, {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error('Error en la respuesta de Cloudinary');
                }

                const data = await response.json();
                console.log(data); // Verifica la respuesta de Cloudinary

                if (data.error) {
                    setErrorMessage("Error al subir la imagen, por favor intente nuevamente.");
                    setIsLoading(false);
                    return; // Salimos de la función si hay un error
                }

                // Guardamos la URL de la imagen subida con un zoom por defecto
                uploadedImages.push({ ruta: data.url, zoom: "x4" });
            } catch (error) {
                setErrorMessage("Hubo un problema con la conexión, por favor intente más tarde.");
                console.error('Error al subir la imagen:', error);
                setIsLoading(false);
                return; // Salimos de la función si hay un error
            }
        }

        // Combina las imágenes existentes con las nuevas subidas
        const allImages = [...existingImages, ...uploadedImages];
        console.log("Imágenes después de la subida:", allImages); // Verifica las imágenes almacenadas

        // Actualiza el estado de las imágenes
        setImages(allImages);

        // Llamamos a la función onChange para enviar las URLs al padre
        if (onChange) {
            onChange(allImages); // Ahora pasamos todas las URLs de las imágenes
        }

        setIsLoading(false);
    };

    //----- Función para manejar la eliminación de imágenes --------------------------------------------------
    const handleDeleteImage = (index) => {
        const newImages = images.filter((_, i) => i !== index);
        setImages(newImages);

        // Llamamos a onChange con las nuevas URLs después de eliminar una imagen
        if (onChange) {
            onChange(newImages);
        }
    };

    //----- Función para manejar el cambio de zoom -------------------------------------------
    const handleZoomChange = (index, zoom) => {
        const newImages = [...images];
        newImages[index].zoom = zoom; // Actualiza el zoom de la imagen correspondiente
        setImages(newImages);

        // Llamamos a onChange con las nuevas URLs después de cambiar el zoom
        if (onChange) {
            onChange(newImages);
        }
    };

    return (
        <>
            <div>
                <input
                    id="imgs"
                    name="imagenes[]"
                    type="file"
                    accept="image/*"
                    multiple
                    onChange={urlImages}
                    className="mb-4"
                    aria-label="Selecciona las imágenes que deseas subir"
                />

                {errorMessage && (
                    <div className="text-red-500 text-center mb-4">
                        <p>{errorMessage}</p>
                    </div>
                )}

                <div id="imgcontainer" className="flex flex-wrap justify-start gap-5">
                    {isLoading ? (
                        <div className="w-full mt-5 text-center">
                            <p className="text-lg font-semibold">Cargando imágenes...</p>
                            <div className="loader mt-2"></div>
                        </div>
                    ) : (
                        Array.isArray(images) && images.length > 0 ? (
                        images.map((image, index) => (
                            <div key={index} className="mt-5 relative">
                                <img
                                    src={image.ruta}
                                    alt={`Imagen subida ${index}`}
                                    className="w-32 h-32 rounded-full object-cover"
                                />
                                <button
                                    className="absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full p-1"
                                    onClick={() => handleDeleteImage(index)}
                                    aria-label="Eliminar imagen"
                                >
                                    X
                                </button>

                                <select
                                    className="mt-2 w-32 p-2 bg-white border-2 border-gray-300 rounded-lg text-gray-700 font-medium shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none hover:border-blue-500 transition duration-300 ease-in-out"
                                    name="zoom"
                                    value={image.zoom} // Cambiado a value para controlar el estado
                                    onChange={(e) => handleZoomChange(index, e.target.value)} // Llama a la función al cambiar el zoom
                                >
                                    <option value="" disabled>Aumento</option>
                                    {aumentos.map((aument, i) => (
                                        <option value={aument} key={i}>
                                            {aument}
                                        </option>
                                    ))}
                                </select>
                            </div>
                        ))
                    ) : (
                        <div className="text-center mt-5">
                            <p>No hay imágenes disponibles.</p>
                        </div>)
                    )}
                </div>
            </div>
        </>
    );
}
