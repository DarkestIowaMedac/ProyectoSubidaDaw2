<?php

namespace Database\Seeders;

use App\Models\Naturaleza;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NaturalezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
