@extends('plantillas.app')

@section('contenido')
<h1>Editar Membresía</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('membresias.update', $membresia->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" id="cliente_id" required>
        <option value="">-- Seleccione un cliente --</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ (old('cliente_id', $membresia->cliente_id) == $cliente->id) ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
        @endforeach
    </select>

    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" required>
        <option value="">-- Seleccione tipo --</option>
        <option value="dia" {{ (old('tipo', $membresia->tipo) == 'dia') ? 'selected' : '' }}>Día</option>
        <option value="15dias" {{ (old('tipo', $membresia->tipo) == '15dias') ? 'selected' : '' }}>15 días</option>
        <option value="mes" {{ (old('tipo', $membresia->tipo) == 'mes') ? 'selected' : '' }}>Mes</option>
    </select>

    <label for="fecha_inicio">Fecha de inicio:</label>
    <input 
        type="date" 
        name="fecha_inicio" 
        id="fecha_inicio" 
        value="{{ old('fecha_inicio', \Carbon\Carbon::parse($membresia->fecha_inicio)->format('Y-m-d')) }}" 
        required 
        min="{{ date('Y-m-d') }}"
    >

    <button type="submit">Actualizar</button>
</form>
@endsection
