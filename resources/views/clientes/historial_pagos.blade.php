@extends('plantillas.app')
@section('contenido')

<h3>Historial de Pagos - {{ $cliente->nombre }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Monto</th>
            <th>Detalle</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}</td>
            <td>{{ $pago->monto }}</td>
            <td>{{ $pago->concepto ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
