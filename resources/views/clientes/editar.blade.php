@extends('plantillas.app')
@section('contenido')

<h3>Editar Cliente</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.actualizar', $cliente) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">CI</label>
        <input type="text" name="ci" value="{{ old('ci', $cliente->ci) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select">
            @foreach(['activo', 'inactivo'] as $estado)
                <option value="{{ $estado }}" @selected(old('estado', $cliente->estado) === $estado)>{{ ucfirst($estado) }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
