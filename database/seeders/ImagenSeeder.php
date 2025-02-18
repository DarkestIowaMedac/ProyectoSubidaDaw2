<?php

namespace Database\Seeders;

use App\Models\Imagen;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
