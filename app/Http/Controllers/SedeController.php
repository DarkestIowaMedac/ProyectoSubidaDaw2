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
    public function show($sede_id)

    {
        $sede = Sede::find($sede_id);
        if (!$sede) {
            return response()->json(['message' => 'Sede no encontrada'], 404);
        }
        return response()->json($sede, 200);
    }
}
