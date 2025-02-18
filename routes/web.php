<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InterpretacionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/formulario', function () {
    return Inertia::render('Formulario');
})->middleware(['auth', 'verified'])->name('formulario');

Route::get('/sedes', [MuestraController::class, 'showSedes']); // Obtener todas las muestras
Route::get('/formatos', [MuestraController::class, 'showFormatos']); // Obtener todas las muestras

Route::get('/muestras', [MuestraController::class, 'index']); // Obtener todas las muestras
Route::post('/crearmuestra', [MuestraController::class, 'store']); // Crear una nueva muestra
Route::get('/muestra/{id}', [MuestraController::class, 'show']); // Obtener una muestra específica
Route::put('/actualizarmuestra/{id}', [MuestraController::class, 'update']); // Actualizar una muestra específica
Route::delete('/borrarmuestra/{id}', [MuestraController::class, 'destroy']); // Eliminar una muestra específica

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->get('/user/id', [UsuarioController::class, 'idUsuario']); //Obtener el id del usuario que ha iniciado sesión o se ha registrado

Route::post('/crearinterpretaciones/{muestra_id}', [InterpretacionController::class, 'store']);
Route::delete('/borrarinterpretaciones/{muestra_id}', [InterpretacionController::class, 'delete']);

Route::post('/crearimagenes/{muestra_id}', [ImagenController::class, 'store']);
Route::delete('/borrarimagenes/{muestra_id}', [ImagenController::class, 'delete']);

Route::get('/interpretaciones', [InterpretacionController::class, 'index']);
Route::post('/muestras/{muestra_id}/interpretaciones', [InterpretacionController::class, 'store']);
Route::delete('/muestras/{muestra_id}/interpretaciones', [InterpretacionController::class, 'delete']);
Route::get('/muestras/{muestra_id}/interpretaciones', [InterpretacionController::class, 'showByMuestraId']);

Route::get('/imagenes', [ImagenController::class, 'index']);
Route::post('/muestras/{muestra_id}/imagenes', [ImagenController::class, 'store']);
Route::delete('/muestras/{muestra_id}/imagenes', [ImagenController::class, 'delete']);
Route::get('/muestras/{muestra_id}/imagenes', [InterpretacionController::class, 'showByMuestraId']);


require __DIR__.'/auth.php';
