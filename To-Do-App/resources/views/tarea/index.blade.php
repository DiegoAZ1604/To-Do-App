@extends('layouts.app') 

@section('content')
    <div style="color: white;">
        <h1>TaskMaster :)</h1>
        <div>
            @forelse ($tasks as $task)
                @if ($task->estado !== 'completada')
                    <!-- Show the title of the task -->
                    <div id="task-{{ $task->id }}" style="cursor: pointer;">{{ $task->titulo }}</div>

                        <!-- Show the content of the popup menu -->
                        <div id="popupMenu-{{ $task->id }}" style="display: none">

                            <div id="description-{{ $task->id }}">{{ $task->descripcion }}</div>
                            
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
                <a href="{{ route('showCompleted') }}">Show Completed</a>
            </div>
        </div>
    </div>
@endsection
