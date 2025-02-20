<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    /**
     * Muestra la información de un formato y sus muestras asociadas.
     *
     * @param int $formato_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarFormato($formato_id)
    {
        // Buscar el formato con las muestras asociadas
        $formato = Formato::find($formato_id);

        // Verificar si el formato existe
        if (!$formato) {
            return response()->json(['mensaje' => 'Formato no encontrado'], 404);
        }

        return response()->json($formato);
    }
}
