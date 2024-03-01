@extends('layouts.app')

@section('content')
   <div style="color: white;">
        <h1>Completed Tasks:</h1>

        @if(count($tasks) > 0)
            <ul>
                @foreach($tasks as $task)
                    <!-- Show the title of the task -->
                    <div id="task-{{ $task->id }}" style="cursor: pointer;">{{ $task->titulo }}</div>

                    <!-- Show the content of the popup menu -->
                    <div id="popupMenu-{{ $task->id }}" style="display: none">
                        <!-- Button to mark the task as pending -->
                        <form method="POST" action="{{ route('markPending', $task->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark as Pending</button>
                        </form>

                        <form method="POST" action="{{ route('deleteTask', $task->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete Task</button>
                        </form>
                    </div>

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
                @endforeach
            </ul>
        @else
            <p>No completed tasks.</p>
        @endif
   </div>
@endsection
