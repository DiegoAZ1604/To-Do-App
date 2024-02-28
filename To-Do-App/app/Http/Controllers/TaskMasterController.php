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

    public function deleteTask($id)
    {
        $task = Tarea::find($id);
        $task->delete();
        return redirect('/');
    }

    public function assignImportance($id, Request $request)
    {
        $task = Tarea::find($id);
        $task->prioridad = $request->importance;
        $task->save();
        return redirect('/');
    }

    public function saveTask(Request $request)
    {   
        if($request->tituloTarea == null){
            return redirect('/');
        }
        $newTask = new Tarea;
        $newTask->titulo = $request->tituloTarea;
        $newTask->estado = 'pendiente';
        $newTask->fecha_inicio = date('Y-m-d');
        $newTask->save();
        return redirect('/');
    }

    public function showCompleted()
    {
        \Log::info(json_encode($request->all()));
        return view('completed', ['tasks' => Tarea::where('estado', 'completada')->get()]);
    }


}