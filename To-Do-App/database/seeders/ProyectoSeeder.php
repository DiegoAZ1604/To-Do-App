<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'nombre' => 'Project 1',
            'descripcion' => 'Description for Project 1',
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addDays(30),
            'estado' => 'en progreso',
        ]);

        // Add more projects as needed
    }
}
