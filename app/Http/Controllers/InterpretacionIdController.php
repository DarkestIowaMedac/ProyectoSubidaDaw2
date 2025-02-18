<?php

namespace App\Http\Controllers;


use App\Models\Interpretacion;

class InterpretacionIdController extends Controller
{
    /**
     * Muestra una interpretación específica a partir del muestra_id.
     */
    public function show($muestra_id)
    {
        // Buscar una interpretación asociada a la muestra
        $interpretacion = Interpretacion::where('muestra_id', $muestra_id)->first();

        if (!$interpretacion) {
            return response()->json(['message' => 'Interpretación no encontrada'], 404);
        }

        return response()->json($interpretacion);
    }
}

