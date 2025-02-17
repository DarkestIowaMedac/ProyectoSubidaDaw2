<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\ProfileController;

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


Route::resource('sedes', SedeController::class);


Route::post('muestras', [MuestraController::class, 'store'])->name('muestras.store');
Route::get('muestra/{id}', [MuestraController::class, 'show'])->name('muestra.show');



require __DIR__.'/auth.php';
