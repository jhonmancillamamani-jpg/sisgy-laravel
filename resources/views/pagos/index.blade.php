@extends('plantillas.app')

@section('contenido')
<h3>Pagos</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('pagos.crear') }}" class="btn btn-primary mb-3">Nuevo Pago</a>
<a href="{{ route('pagos.reporte') }}" target="_blank" class="btn btn-outline-danger btn-sm">
    <i class="bi bi-file-earmark-pdf"></i> Generar PDF
</a>
<a href="{{ route('pagos.recibo', $pago) }}" class="btn btn-sm btn-info" target="_blank">Recibo</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{{ $pago->id }}</td>
            <td>{{ $pago->cliente->nombre }}</td>
            <td>{{ number_format($pago->monto, 2) }}</td>
            <td>{{ $pago->fecha->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('pagos.editar', $pago) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('pagos.eliminar', $pago) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Eliminar pago?');" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $pagos->links() }}
@endsection
