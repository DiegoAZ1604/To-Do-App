<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProject(Request $request)
    {
        return view('proyecto.create');
    }

    public function index()
    {
        $tasks = Tarea::where('estado', 'pendiente')->get();
        $proyectos = Proyecto::where('estado', 'en progreso')->get();
        return view('tarea.index', ['tasks' => $tasks, 'proyectos' => $proyectos]);
    }

    public function saveProject(Request $request)
    {
        $newProject = new Proyecto;
        $newProject->nombre = $request->titulo;
        $newProject->descripcion = $request->descripcion;
        $newProject->fecha_inicio = date('Y-m-d');
        $newProject->estado = 'en progreso';
        $newProject->save();
        return redirect('/');
    }

    public function markProjectPending($id)
    {
        $project = Proyecto::find($id);
        $project->estado = 'en progreso';
        $project->save();
        $tasks = Tarea::where('id_proyecto', $id)->get();
        foreach($tasks as $task){
            $task->estado = 'pendiente';
            $task->save();
        }
        return redirect('/');
    }

    public function markProjectCompleted($id)
    {
        $project = Proyecto::find($id);
        $project->estado = 'completado';
        $project->save();
        $tasks = Tarea::where('id_proyecto', $id)->get();
        foreach($tasks as $task){
            $task->estado = 'completada';
            $task->save();
        }
        return redirect('/');
    }

    public function deleteProject($id)
    {
        $project = Proyecto::find($id);
        $project->delete();
        return redirect('/');
    }

    public function showProjects()
    {
        $proyectos = Proyecto::where('estado', 'en progreso')->get();
        $tasks = Tarea::where('estado', 'pendiente')->get();
        return view('proyecto.index', compact('proyectos', 'tasks'));  
    }

    public function completedProjects()
    {
        return view('proyecto.completed', ['proyectos' => Proyecto::where('estado', 'completado')->get()]);
    }
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto deleted successfully');
    }
}
