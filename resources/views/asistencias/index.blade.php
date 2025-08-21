@extends('plantillas.app')
@section('contenido')

<h3>Listado de Asistencias</h3>

<form method="GET" class="mb-3">
    <div class="row g-2">
        <div class="col-md-3">
            <input type="date" name="inicio" class="form-control" value="{{ request('inicio') }}" placeholder="Fecha inicio">
        </div>
        <div class="col-md-3">
            <input type="date" name="fin" class="form-control" value="{{ request('fin') }}" placeholder="Fecha fin">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Limpiar</a>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('asistencias.exportar') }}" class="btn btn-success">Exportar Excel</a>
            <br>
            <a href="{{ route('asistencias.crear') }}" class="btn btn-primary mb-3">Agregar Asistencia</a>                      
        </div>
    </div>
</form>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->id }}</td>
                <td>{{ $asistencia->cliente->nombre }}</td>
                <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $asistencias->links() }}

@endsection
