@extends('plantillas.app')

@section('contenido')
<h1>Crear Membresía</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('membresias.store') }}" method="POST">
    @csrf

    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" id="cliente_id" required>
        <option value="">-- Seleccione un cliente --</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
        @endforeach
    </select>

    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" required>
        <option value="">-- Seleccione tipo --</option>
        <option value="dia" {{ old('tipo') == 'dia' ? 'selected' : '' }}>Día</option>
        <option value="15dias" {{ old('tipo') == '15dias' ? 'selected' : '' }}>15 días</option>
        <option value="mes" {{ old('tipo') == 'mes' ? 'selected' : '' }}>Mes</option>
    </select>

    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" required min="{{ date('Y-m-d') }}">

    <button type="submit">Crear</button>
</form>

@endsection
