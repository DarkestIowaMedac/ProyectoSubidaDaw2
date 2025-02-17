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
     * Muestra el formulario para crear una nueva sede.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Aquí podrías devolver una vista para crear una sede si estás usando Blade.
        return view('sedes.create');
    }

    /**
     * Almacena una nueva sede en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'codigo' => 'required|string|max:255|unique:sedes',
            'nombre' => 'required|string|max:255',
        ]);

        // Crear la nueva sede
        $sede = Sede::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
        ]);

        return response()->json($sede, 201);  // Retornar la sede recién creada
    }

    /**
     * Muestra los detalles de una sede específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sede = Sede::with(['users', 'muestras'])->findOrFail($id);  // Cargar usuarios y muestras relacionados
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
        $sede = Sede::findOrFail($id);
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
        $sede = Sede::findOrFail($id);
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
        $sede = Sede::findOrFail($id);
        $sede->delete();

        return response()->json(['message' => 'Sede eliminada correctamente']);
    }
}
