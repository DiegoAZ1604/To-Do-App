@extends('layouts.app')

@section('content')
    <div style="color: white;">
        <h1>All Projects :)</h1>
    </div>
    <div style="color: white;">
        @forelse ($proyectos as $proyecto)
            <!-- Show the title of the project -->
            <li id="project-{{ $proyecto->id }}" style="cursor: pointer;">{{ $proyecto->nombre }}</li>

            <!-- Show the content of the popup menu -->
            <div id="popupMenu-{{ $proyecto->id }}" style="display: none">

                <!-- Show the description of the project -->
                <div id="description-{{ $proyecto->id }}">
                    @if ($proyecto->descripcion === null)
                        No description yet!
                    @else
                    <p>Description: {{ $proyecto->descripcion }} </p>
                    @endif
                </div>

                <!-- Show the tasks of the project -->
                <div>
                    <p>Tasks:</p>
                    @foreach ($tasks as $task)
                        @if ($task->id_proyecto === $proyecto->id)
                            
                            <li id="task-{{ $task->id }}">Task: {{ $task->titulo }}</li>
                        @endif
                    @endforeach

                    @if ($proyecto->tareas->isEmpty())
                        <div>No tasks yet!</div>
                    @endif
                </div>

                <!--Mark project as completed -->
                <div>
                    <form method="POST" action="{{ route('markProjectCompleted', $proyecto->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Completed</button>
                    </form>
                </div>

                <!-- Delete project -->
                <div>
                    <form method="POST" action="{{ route('deleteProject', $proyecto->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete Project</button>
                    </form>
                </div>

            </div>

            <script>
                document.getElementById('project-{{ $proyecto->id }}').addEventListener('click', function() {
                    var popupMenu = document.getElementById('popupMenu-{{ $proyecto->id }}');
                    if (popupMenu.style.display === 'none') {
                        popupMenu.style.display = 'block';
                    } else {
                        popupMenu.style.display = 'none';
                    }
                });
            </script>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </div> 
@endsection
