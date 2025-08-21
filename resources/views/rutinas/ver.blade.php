@extends('plantillas.app')
@section('contenido')

<h3>Detalle de Rutina</h3>

<div class="card">
    <div class="card-body">
        <h5>Cliente:</h5>
        <p>{{ $rutina->cliente->nombre }}</p>

        <h5>Nombre:</h5>
        <p>{{ $rutina->nombre }}</p>

        <h5>Descripción:</h5>
        <p>{{ $rutina->descripcion }}</p>
    </div>
</div>

<a href="{{ route('rutinas.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>

@endsection
