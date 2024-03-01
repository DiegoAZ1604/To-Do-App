<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;

class TaskMasterController extends Controller
{
 
    public function index()
    {
        $tasks = Tarea::where('estado', 'pendiente')->get();
        $proyectos = Proyecto::all();
        return view('tarea.index', ['tasks' => $tasks, 'proyectos' => $proyectos]);
    }


    public function createTask(Request $request)
    {
        $proyectos = Proyecto::all();
       return view('tarea.create', compact('proyectos'));
    }

    public function markComplete($id)
    {
        $task = Tarea::find($id);
        $task->estado = 'completada';
        $task->save();
        return redirect('/');
    }

    public function markPending($id)
    {
        $task = Tarea::find($id);
        $task->estado = 'pendiente';
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
        if($request->titulo == null){
            return redirect('/');
        }
        $newTask = new Tarea;
        $newTask->titulo = $request->titulo;
        $newTask->descripcion = $request->descripcion;
        $newTask->estado = 'pendiente';
        $newTask->fecha_inicio = date('Y-m-d');
        $newTask->prioridad = $request->importance;
        $newTask->id_proyecto = $request->proyecto;
        $newTask->save();
        
        return redirect('/')/*->with('success', 'Task created successfully.')*/;
    }

    public function showCompleted()
    {
        return view('tarea.completed', ['tasks' => Tarea::where('estado', 'completada')->get()]);
    }

}