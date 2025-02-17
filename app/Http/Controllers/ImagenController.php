<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Muestra;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function store(Request $request, $muestra_id){
        // Obtener la muestra a partir de la ID que se pasa en el cuerpo de la solicitud

        $muestra = Muestra::find($muestra_id);

        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }


         $imagenesData = $request->input('imagenes'); // Suponiendo que las imágenes se envían como un array


         foreach ($imagenesData as $imagenData) {
             $imagen = new Imagen();
             $imagen->ruta = $imagenData['ruta'];
             $imagen->zoom = $imagenData['zoom'];
             $muestra->imagenes()->save($imagen);
         }
        return response()->json(['message' => 'Imágenes creadas con éxito'], 201);
    }

    public function delete($muestra_id){
        // Obtener la muestra a partir de la ID que se pasa en el cuerpo de la solicitud
        $muestra = Muestra::muestra();
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $muestra->imagenes()->delete();
        return response()->json(['message' => 'Imágenes eliminadas con éxito'], 200);
    }
}
