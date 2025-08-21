@extends('plantillas.app')
@section('contenido')

<h3>Registrar Progreso</h3>

<form method="POST" action="{{ route('rutinas.progreso.store') }}">
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
        <label>Progreso</label>
        <textarea name="progreso" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Registrar</button>
</form>

@endsection
