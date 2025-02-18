<?php

namespace App\Http\Controllers;


use App\Models\Imagen;

class ImagenIdController extends Controller
{
    /**
     * Muestra una imagen específica de una muestra a partir de su ID.
     */
    public function show($muestra_id)
    {
        // Buscar una imagen que pertenezca a la muestra especificada
        $imagen = Imagen::where('muestra_id', $muestra_id)->first();

        if (!$imagen) {
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }

        return response()->json($imagen);
    }
}


