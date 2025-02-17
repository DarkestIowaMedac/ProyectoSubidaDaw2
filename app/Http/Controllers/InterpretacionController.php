<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Interpretacion;

class InterpretacionController extends Controller
{
    public function store(Request $request, $muestra_id){
        $muestra = Muestra::find($muestra_id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $interpretacionesData = $request->input('interpretaciones');

        foreach ($interpretacionesData as $data) {
            $interpretacion = new Interpretacion();
            $interpretacion->idmuestra = $muestra->id;
            $interpretacion->texto = $data['texto'];
            $interpretacion->save();
        }
        return response()->json(['message' => 'Interpretaciones creadas con éxito'], 201);
    }

    public function delete($muestra_id){
        $muestra = Muestra::find($muestra_id);
        if (!$muestra) {
            return response()->json(['message' => 'Muestra no encontrada'], 404);
        }
        $muestra->interpretaciones()->delete();
        return response()->json(['message' => 'Interpretaciones eliminadas con éxito'], 200);
    }
}
