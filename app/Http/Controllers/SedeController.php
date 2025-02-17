<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Muestra una lista de todas las sedes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::all();  // Obtener todas las sedes
        return response()->json($sedes);
    }

    /**
     * Muestra los detalles de una sede específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sede = Sede::with(['users', 'muestras'])->find($id);  // Cargar usuarios y muestras relacionados
        return response()->json($sede);
    }

    /**
     * Muestra el formulario para editar una sede existente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Aquí podrías devolver una vista para editar la sede
        $sede = Sede::find($id);
        return view('sedes.edit', compact('sede'));
    }

    /**
     * Actualiza una sede en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos recibidos
        $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        // Buscar la sede y actualizarla
        $sede = Sede::find($id);
        $sede->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
        ]);

        return response()->json($sede);
    }

    /**
     * Elimina una sede de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);
        $sede->delete();

        return response()->json(['message' => 'Sede eliminada correctamente']);
    }
}
