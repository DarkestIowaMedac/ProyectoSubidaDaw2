<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use App\Models\Interpretacion;
use Illuminate\Http\Request;

class InterpretacionController extends Controller
{
    /**
     * Obtiene todas las interpretaciones creadas
     */
    public function index()
    {
        $interpretaciones = Interpretacion::all();
        return response()->json($interpretaciones, 200);
    }

    /**
     * Obtiene todas las interpretaciones de una muestra específica
     */
    public function showByMuestraId($muestra_id)
    {
        $muestra = Muestra::find($muestra_id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }

        $interpretaciones = Interpretacion::where('muestra_id', $muestra_id)->get();

        return response()->json($interpretaciones, 200);
    }

    /**
     * Guarda nuevas interpretaciones para una muestra específica
     */
    public function store(Request $request, $muestra_id)
    {
        $muestra = Muestra::find($muestra_id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }

        $interpretacionesData = $request->input('interpretaciones');
        $interpretaciones = [];

        foreach ($interpretacionesData as $data) {
            $interpretacion = new Interpretacion();
            $interpretacion->muestra_id = $muestra->id;
            $interpretacion->texto = $data['texto'];
            $interpretacion->save();
            $interpretaciones[] = $interpretacion;
        }

        return response()->json([
            'message' => 'Interpretaciones creadas con éxito',
            'interpretaciones' => $interpretaciones
        ], 201);
    }

    /**
     * Elimina todas las interpretaciones de una muestra específica
     */
    public function delete($muestra_id)
    {
        $muestra = Muestra::find($muestra_id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }

        $muestra->interpretaciones()->delete();
        return response()->json(['message' => 'Interpretaciones eliminadas con éxito'], 200);
    }
}
