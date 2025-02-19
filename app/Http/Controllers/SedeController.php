<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use Illuminate\Support\Facades\Route;

class SedeController extends Controller
{
    /**
     * Muestra la información de una sede por su ID.
     */
    public function show($idSede)
    {
        // Buscar la sede con sus muestras asociadas
        $sede = Sede::with('muestras')->find($idSede);

        // Si no se encuentra la sede, devolver un error 404
        if (!$sede) {
            return response()->json(['message' => 'Sede no encontrada'], 404);
        }

        return response()->json($sede);
    }
}