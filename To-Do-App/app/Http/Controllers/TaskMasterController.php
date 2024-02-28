<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TaskMasterController extends Controller
{
 
    public function index()
    {
        return view('welcome', ['tasks' => Tarea::where('estado', 'pendiente')->get()]);
    }

    public function markComplete($id)
    {
        $task = Tarea::find($id);
        $task->estado = 'completada';
        $task->save();
        return redirect('/');
    }

    public function saveTask(Request $request)
    {   
        /*\Log::info(json_encode($request->all()));*/
        $newTask = new Tarea;
        $newTask->titulo = $request->tituloTarea;
        $newTask->estado = 'pendiente';
        $newTask->save();
        return redirect('/');
    }


}