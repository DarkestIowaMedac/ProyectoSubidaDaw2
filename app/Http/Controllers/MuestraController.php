<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Formato;
use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MuestraController extends Controller
{
    public function store(Request $request)
    {
        $muestra = Muestra::create([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'user_id' => $request->user_id,
            'sede_id' => $request->sede_id,
            'formato_id' => $request->formato_id,
        ]);
        return response()->json($muestra, 201);
    }

    public function index()
    {
        $muestras = Muestra::all();
        return response()->json($muestras);
    }

    public function show($id)
    {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        return response()->json($muestra);
    }


    public function update(Request $request, $id)

    {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }

        $muestra->update([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'user_id' => $request->user_id,
            'sede_id' => $request->sede_id,
            'formato_id' => $request->formato_id,
        ]);
        return response()->json($muestra);
    }

    public function destroy($id)

    {
        $muestra = Muestra::find($id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $muestra->delete();
        return response()->json(null, 204);
    }

    public function showSedes()
    {
        $sedes = Sede::all();
        return response()->json($sedes);
    }

    public function showFormatos()
    {
        $formatos = Formato::all();
        return response()->json($formatos);
    }

}
