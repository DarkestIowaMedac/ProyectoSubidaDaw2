<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MuestraController extends Controller
{
    public function store(Request $request)
    {
        $muestra = Muestra::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
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
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
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

}
