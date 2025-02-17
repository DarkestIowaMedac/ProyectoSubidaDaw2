<?php

namespace Database\Seeders;

use App\Models\Formato;
use App\Models\Imagen;
use App\Models\Interpretacion;
use App\Models\Muestra;
use App\Models\Sede;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Especifica las 15 posibles sedes de las muestras
        $sedes = [
            ['codigo' => 'A', 'nombre' => 'Albacete'],
            ['codigo' => 'AL', 'nombre' => 'Alicante'],
            ['codigo' => 'ALII', 'nombre' => 'Alicante II'],
            ['codigo' => 'I', 'nombre' => 'Almería'],
            ['codigo' => 'C', 'nombre' => 'Córdoba'],
            ['codigo' => 'L', 'nombre' => 'Leganés'],
            ['codigo' => 'G', 'nombre' => 'Granada'],
            ['codigo' => 'H', 'nombre' => 'Huelva'],
            ['codigo' => 'J', 'nombre' => 'Jerez'],
            ['codigo' => 'M', 'nombre' => 'Madrid'],
            ['codigo' => 'MG', 'nombre' => 'Málaga'],
            ['codigo' => 'MU', 'nombre' => 'Murcia'],
            ['codigo' => 'S', 'nombre' => 'Sevilla'],
            ['codigo' => 'V', 'nombre' => 'Valencia'],
            ['codigo' => 'Z', 'nombre' => 'Zaragoza']
        ];

        // Crea las sedes
        foreach ($sedes as $sede) {
            Sede::create($sede);
        }

        // Especifica los 3 posibles formatos de las muestras
        $formatos = [
            ['nombre' => 'Fresco'],
            ['nombre' => 'Formol'],
            ['nombre' => 'Etanol 70%'],
        ];

        // Crea los formatos
        foreach ($formatos as $formato) {
            Formato::create($formato);
        }

        // Especifica los aumentos y rutas de prueba de las imágenes
        $imagenes = [
            ['ruta' => 'https://centromedicoabc.com/storage/2024/07/funciones-Medicina-interna-1024x683.webp', 'zoom' => 'x4'],
            ['ruta' => 'https://centromedicoabc.com/storage/2024/07/funciones-Medicina-interna-1024x683.webp', 'zoom' => 'x10'],
            ['ruta' => 'https://centromedicoabc.com/storage/2024/07/funciones-Medicina-interna-1024x683.webp', 'zoom' => 'x40'],
            ['ruta' => 'https://centromedicoabc.com/storage/2024/07/funciones-Medicina-interna-1024x683.webp', 'zoom' => 'x100'],
        ];

        // Crea las imágenes
        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }

        // Crea un usuario de prueba
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
        ]);

        // Crea 10 muestras falsas de prueba
        Muestra::factory()->count(10)->create();

        // Crea 10 interpretaciones falsas de prueba
        Interpretacion::factory()->count(10)->create();
    }
}
