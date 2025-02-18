<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un usuario de prueba
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
        ]);

        // Crea 99 usuarios falsos más
        User::factory()->count(99)->create();
    }
}
