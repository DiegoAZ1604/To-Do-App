@extends('layouts.app')

@section('content')
    <body>
        <div style="color: white;" class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Create Task</h1>

            <form method="POST" action="{{ route('saveTask') }}">
                {{ csrf_field() }}
            
                <div class="mb-4">
                    <label for="titulo" class="block mb-2">Task Title</label>
                    <input style="color: black;" type="text" name="titulo" id="titulo" class="w-full border border-gray-400 p-2 rounded">
                </div>
            
                <div class="mb-4">
                    <label for="descripcion" class="block mb-2">Description</label>
                    <textarea style="color: black;" name="descripcion" id="descripcion" class="w-full border border-gray-400 p-2 rounded"></textarea>
                </div>

                <div class="mb-4">
                    <label for="proyecto" class="block mb-2">Change Priority</label>
                    <select style="color: black;" name="importance" id="">
                        <option style="color: black;" value="0">Important</option>
                        <option style="color: black;" value="1">Urgent</option>
                        <option style="color: black;" value="2">Maximum Urgency</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="proyecto" class="block mb-2">Add to a Project?</label>
                    <select style="color: black;" name="proyecto" id="proyecto" class="w-full border border-gray-400 p-2 rounded">
                        <option value="" >Select a Project...</option>
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">Save Task</button>
            </form>

        </div>
    </body>
@endsection
