<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Muestra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImagenController extends Controller
{
    public function store(Request $request) {
            // Obtener la muestra a partir de la ID que se pasa en el cuerpo de la solicitud
            $muestra = Muestra::find($request["imagenes"][0]["muestra_id"]);
            if (!$muestra) {
                return response()->json(['message' => 'Muestra no encontrada'], 404);
            }
    
            $imagenesGuardadas = [];

            foreach ($request["imagenes"] as $imagenData) {
                $imagen = new Imagen();
                $imagen->ruta = $imagenData['ruta'];
                $imagen->zoom = $imagenData['zoom'];
                $imagen->muestra_id = $muestra->id;
                $imagen->save(); // Guardar la imagen en la base de datos
                $imagenesGuardadas[] = $imagen;
            }
    
            return response()->json($imagenesGuardadas, 201);
    }

    // public function delete($muestra_id){
    //     $muestra = Muestra::find($muestra_id);
    //     if (!$muestra) {
    //         return response()->json(['message' => 'Muestra no encontrada'], 404);
    //     }

    //     Imagen::where('muestra_id', $muestra_id)->delete();
    //     return response()->json(['message' => 'Imágenes eliminadas con éxito'], 200);
    // }

    public function index()
    {
        $imagenes = Imagen::all();
        return response()->json($imagenes, 200);
    }


    // Método para ver todas las imágenes (filtro por ID de muestra)
    public function showByMuestraId($muestra_id)
    {
        $muestra = Muestra::find($muestra_id);

        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }

        $imagenes = Imagen::where('muestra_id', $muestra_id)->get();

        if ($imagenes->isEmpty()) {
            return response()->json(['message' => 'No hay imágenes registradas para esta muestra'], 404);
        }

        return response()->json($imagenes, 200);
    }
}
