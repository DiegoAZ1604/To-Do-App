@extends('layouts.app') 

@section('content')
    <div style="color: white;">
        <h1>TaskMaster :)</h1>
        <div>
            @forelse ($tasks as $task)
                @if ($task->estado !== 'completada')
                    <!-- Show the title of the task -->
                    <li id="task-{{ $task->id }}" style="cursor: pointer;">{{ $task->titulo }}</li>

                        <!-- Show the content of the popup menu -->
                        <div id="popupMenu-{{ $task->id }}" style="display: none">

                            <!-- Show the description of the task -->
                            <div id="description-{{ $task->id }}">
                                @if ($task->descripcion === null)
                                   <p>No description yet!</p>
                                @else
                                    <p>Description: {{ $task->descripcion }} </p>
                                @endif
                            </div>
                            
                            <!-- Show the project the task belongs to -->
                            @foreach ($proyectos as $proyecto)
                                @if ($proyecto->id === $task->id_proyecto)
                                    <div id="belongsTo-{{ $proyecto->id }}">Belongs to project: {{ $proyecto->nombre }}</div>
                                @endif
                            @endforeach

                            <!-- Button to mark the task as complete -->
                            <form method="POST" action="{{ route('markComplete', $task->id) }}" accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Complete</button>
                            </form>

                        <!-- Delete task -->
                        <form method="POST" action="{{ route('deleteTask', $task->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete Task</button>
                        </form>

                        <!-- Assign importance to tasks -->
                        <form method="POST" action="{{ route('assignImportance', $task->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <select style="color: black;" name="importance" id="">
                                <option style="color: black;" value="0" {{ $task->prioridad == '0' ? 'selected' : '' }}>Important</option>
                                <option style="color: black;" value="1" {{ $task->prioridad == '1' ? 'selected' : '' }}>Urgent</option>
                                <option style="color: black;" value="2" {{ $task->prioridad == '2' ? 'selected' : '' }}>Maximum Urgency</option>
                            </select>                                
                            <button type="submit">Asign Importance</button>
                        </form> 
                    </div>

                    

                    <!-- Logic for the popup menu -->
                    <script>
                        document.getElementById('task-{{ $task->id }}').addEventListener('click', function() {
                            var popupMenu = document.getElementById('popupMenu-{{ $task->id }}');
                            if (popupMenu.style.display === 'none') {
                                popupMenu.style.display = 'block';
                            } else {
                                popupMenu.style.display = 'none';
                            }
                        });
                    </script>
                @endif
            @empty
                <p>No pending tasks. ;)</p>
            @endforelse
            <div>
                <a href="{{ route('createTask') }}">Create New Task</a>
            </div>
            <div>
                <a href="{{ route('createProject') }}">Create New Project</a>
            </div>
            <div>
                <a href="{{ route('showCompleted') }}">Show Completed Tasks</a>
            </div>
            <div>
                <a href="{{ route('showProjects') }}">Show all Projects</a>
            </div>
        </div>
    </div>
@endsection
