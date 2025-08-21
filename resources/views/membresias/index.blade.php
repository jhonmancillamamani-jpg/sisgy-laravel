@extends('plantillas.app')

@section('contenido')
<h1>Membresías</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Botón para crear nueva membresía -->
<a href="{{ route('membresias.crear') }}" class="btn btn-success mb-3">Crear Membresía</a>

<form method="GET" action="{{ route('membresias.index') }}" class="mb-3 d-flex gap-2 align-items-center">
    <select name="cliente_id" class="form-select" style="max-width: 200px;">
        <option value="">-- Todos los clientes --</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
        @endforeach
    </select>

    <select name="tipo" class="form-select" style="max-width: 150px;">
        <option value="">-- Todos los tipos --</option>
        <option value="dia" {{ request('tipo') == 'dia' ? 'selected' : '' }}>Día</option>
        <option value="15dias" {{ request('tipo') == '15dias' ? 'selected' : '' }}>15 días</option>
        <option value="mes" {{ request('tipo') == 'mes' ? 'selected' : '' }}>Mes</option>
    </select>

    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($membresias as $membresia)
        <tr>
            <td>{{ $membresia->id }}</td>
            <td>{{ $membresia->cliente->nombre }}</td>
            <td>{{ ucfirst($membresia->tipo) }}</td>
           <td>{{ \Carbon\Carbon::parse($membresia->fecha_inicio)->format('d/m/Y') }}</td>
<td>{{ \Carbon\Carbon::parse($membresia->fecha_fin)->format('d/m/Y') }}</td>

            <td>
                @if($membresia->estaActiva())
                    <span class="badge bg-success">Activa</span>
                @else
                    <span class="badge bg-secondary">Inactiva</span>
                @endif
            </td>
            <td>
                <a href="{{ route('membresias.editar', $membresia->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('membresias.eliminar', $membresia->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta membresía?');" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $membresias->links() }}

@endsection
