@extends('plantillas.app')
@section('contenido')

<h3>Clientes</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('clientes.crear') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>
<a href="{{ route('clientes.exportar') }}" class="btn btn-success mb-2">Exportar a Excel</a>

@if($clientes->count())
<table class="table table-bordered">
    <thead>
        <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->ci }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ ucfirst($cliente->estado) }}</td>
            <td>
                <a href="{{ route('clientes.editar', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('clientes.eliminar', $cliente) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Eliminar cliente?');" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $clientes->links() }}
@else
<p>No hay clientes registrados.</p>
@endif

@endsection
