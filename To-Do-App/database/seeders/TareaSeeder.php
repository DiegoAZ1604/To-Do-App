<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarea::create([
            'titulo' => 'Task 1',
            'descripcion' => 'Description for Task 1',
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addDays(7),
            'prioridad' => 0, // Low priority
            'categoria' => 'Category 1',
            'estado' => 'pendiente',
             // Assuming the user ID is 1
        ]);

        /*Tarea::create([
            'titulo' => 'Task 2',
            'descripcion' => 'Description for Task 2',
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addDays(10),
            'prioridad' => 1, // Medium priority
            'categoria' => 'Category 2',
            'estado' => 'pendiente',
            'id_proyecto' => 2, // Assuming the project ID is 2
            'id_usuario' => 2, // Assuming the user ID is 2
        ]);*/

        // Add more tasks as needed
    }
}