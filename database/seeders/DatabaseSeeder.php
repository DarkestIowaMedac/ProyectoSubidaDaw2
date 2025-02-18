<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Interpretacion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Controla el orden de creación del seeder
        $this->call(UserSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(FormatoSeeder::class);
        $this->call(NaturalezaSeeder::class);
        $this->call(MuestraSeeder::class);
        $this->call(ImagenSeeder::class);
        $this->call(InterpretacionSeeder::class);
        $this->call(DescripcionSeeder::class);
        $this->call(CalidadSeeder::class);
    }
}
