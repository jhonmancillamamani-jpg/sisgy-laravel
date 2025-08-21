@extends('plantillas.app')
@section('contenido')

<h3>Asignar Rutina</h3>

<form method="POST" action="{{ route('rutinas.asignar.store') }}">
    @csrf
    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id" class="form-control">
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Rutina</label>
        <select name="rutina_id" class="form-control">
            @foreach($rutinas as $rutina)
            <option value="{{ $rutina->id }}">{{ $rutina->nombre }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Asignar</button>
</form>

@endsection
