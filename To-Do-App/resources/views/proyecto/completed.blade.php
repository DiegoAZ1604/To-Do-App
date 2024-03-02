@extends('layouts.app')

@section('content')
   <div style="color: white;">
        <h1>Completed Projects:</h1>

        @if(count($proyectos) > 0)
            <div>
                @foreach($proyectos as $proyecto)
                    <!-- Show the title of the project -->
                    <li id="proyecto-{{ $proyecto->id }}" style="cursor: pointer;">{{ $proyecto->nombre }}</li>

                    <!-- Show the content of the popup menu -->
                    <div id="popupMenu-{{ $proyecto->id }}" style="display: none">
                       
                        <!-- Button to mark the project as pending -->
                        <form method="POST" action="{{ route('markProjectPending', $proyecto->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark as Pending</button>
                        </form>
                        
                        <!--Delete project -->
                        <form method="POST" action="{{ route('deleteProject', $proyecto->id) }}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete Project</button>
                        </form>
                    </div>

                    <script>
                        document.getElementById('proyecto-{{ $proyecto->id }}').addEventListener('click', function() {
                            var popupMenu = document.getElementById('popupMenu-{{ $proyecto->id }}');
                            if (popupMenu.style.display === 'none') {
                                popupMenu.style.display = 'block';
                            } else {
                                popupMenu.style.display = 'none';
                            }
                        });
                    </script>
                @endforeach
                </div>
        @else
            <p>No completed projects :(</p>
        @endif
   </div>
@endsection
