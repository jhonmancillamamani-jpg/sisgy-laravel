@extends('plantillas.app')
@section('contenido')

<h3>Reporte de Pagos</h3>

<form method="GET" class="mb-3">
    <div class="row g-2">
        <div class="col">
            <input type="date" name="inicio" class="form-control" value="{{ request('inicio') }}">
        </div>
        <div class="col">
            <input type="date" name="fin" class="form-control" value="{{ request('fin') }}">
        </div>
        <div class="col">
            <button class="btn btn-success">Filtrar</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{{ $pago->cliente->nombre }}</td>
            <td>{{ \Carbon\Carbon::parse($pago->fecha)->format('d/m/Y') }}</td>
            <td>{{ $pago->monto }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
