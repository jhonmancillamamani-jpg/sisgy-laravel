@extends('plantillas.app')
@section('contenido')

<h3>Registrar Cliente</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('clientes.guardar') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Ci</label>
        <input type="text" name="ci" value="{{ old('ci') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control">
    </div>
    <select name="estado" class="form-select">
<option value="activo">activo</option>
<option value="inactivo">inactivo</option>
</select>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
