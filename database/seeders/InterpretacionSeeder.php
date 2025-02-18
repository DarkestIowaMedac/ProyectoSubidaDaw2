<?php

namespace Database\Seeders;

use App\Models\Interpretacion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterpretacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea 10 interpretaciones falsas de prueba
        Interpretacion::factory()->count(10)->create();
    }
}
