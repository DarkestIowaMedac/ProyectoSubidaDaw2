<?php

namespace Database\Seeders;

use App\Models\Formato;
use App\Models\Imagen;
use App\Models\Interpretacion;
use App\Models\Muestra;
use App\Models\Naturaleza;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea un usuario de prueba
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
        ]);

        // Crea 10 usuarios falsos más
        // User::factory()->count(10)->create();

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

        // Especifica la naturaleza (id y tipo de estudio)
        $naturalezas = [
            ['codigo' => 'BB', 'tipoEstudio' => 'Biopsia de bazo'],
            ['codigo' => 'BCB', 'tipoEstudio' => 'Biopsia de cerebro'],
            ['codigo' => 'BC', 'tipoEstudio' => 'Biopsia de corazón'],
            ['codigo' => 'BEF', 'tipoEstudio' => 'Biopsia de esófago'],
            ['codigo' => 'BES', 'tipoEstudio' => 'Biopsia de estómago'],
            ['codigo' => 'BF', 'tipoEstudio' => 'Biopsia de feto'],
            ['codigo' => 'BH', 'tipoEstudio' => 'Biopsia de hígado'],
            ['codigo' => 'BI', 'tipoEstudio' => 'Biopsia de intestino'],
            ['codigo' => 'BL', 'tipoEstudio' => 'Biopsia de lengua'],
            ['codigo' => 'BO', 'tipoEstudio' => 'Biopsia de ovario'],
            ['codigo' => 'BPA', 'tipoEstudio' => 'Biopsia de páncreas'],
            ['codigo' => 'BPI', 'tipoEstudio' => 'Biopsia de piel'],
            ['codigo' => 'BP', 'tipoEstudio' => 'Biopsia de pulmón'],
            ['codigo' => 'BR', 'tipoEstudio' => 'Biopsia de riñón'],
            ['codigo' => 'BT', 'tipoEstudio' => 'Biopsia de testículo'],
            ['codigo' => 'BTF', 'tipoEstudio' => 'Biopsia de trompa de falopio'],
            ['codigo' => 'BU', 'tipoEstudio' => 'Biopsia de útero'],
            ['codigo' => 'CB', 'tipoEstudio' => 'Estudio citológico bucal'],
            ['codigo' => 'CV', 'tipoEstudio' => 'Estudio citológico cérvico-vaginal'],
            ['codigo' => 'E', 'tipoEstudio' => 'Estudio citológico de esputo'],
            ['codigo' => 'EX', 'tipoEstudio' => 'Estudio hematológico completo'],
            ['codigo' => 'O', 'tipoEstudio' => 'Estudio microscópico y químico de orina'],
        ];

        // Crea las naturalezas
        foreach ($naturalezas as $naturaleza) {
            Naturaleza::create($naturaleza);
        }

        // Crea 10 muestras falsas de prueba
        // Muestra::factory()->count(10)->create();

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

        // Crea 10 interpretaciones falsas de prueba
        Interpretacion::factory()->count(10)->create();
    }
}
