<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MuestraController;

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
Route::post('/muestras', [MuestraController::class, 'store']); // Crear una nueva muestra
Route::get('/muestras/{id}', [MuestraController::class, 'show']); // Obtener una muestra específica
Route::put('/muestras/{id}', [MuestraController::class, 'update']); // Actualizar una muestra específica
Route::delete('/muestras/{id}', [MuestraController::class, 'destroy']); // Eliminar una muestra específica

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
