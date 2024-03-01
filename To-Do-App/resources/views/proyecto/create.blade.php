@extends('layouts.app')

@section('content')
    <body>
        <div style="color: white;" class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Create Project</h1>

            <form method="POST" action="{{ route('saveProject') }}">
                {{ csrf_field() }}
            
                <div class="mb-4">
                    <label for="titulo" class="block mb-2">Project Title</label>
                    <input style="color: black;" type="text" name="titulo" id="titulo" class="w-full border border-gray-400 p-2 rounded">
                </div>
            
                <div class="mb-4">
                    <label for="descripcion" class="block mb-2">Description</label>
                    <textarea style="color: black;" name="descripcion" id="descripcion" class="w-full border border-gray-400 p-2 rounded"></textarea>
                </div>
            
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">Save Project</button>
            </form>
        </div>
    </body>
@endsection
