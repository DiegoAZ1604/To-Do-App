@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? "{{ __('Show') Proyecto" }}
@endsection

@section('content')
    <h1>{{ $proyecto->nombre }}</h1>

    @if($tareas->count() > 0)
        <ul>
            @foreach($tareas as $tarea)
                <li>{{ $tarea->nombre }}</li>
            @endforeach
        </ul>
    @else
        <p>No tasks found for this project.</p>
    @endif

@endsection
