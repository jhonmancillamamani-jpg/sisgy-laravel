@extends('plantillas.app')
@section('contenido')

<h3>Historial de Asistencias - {{ $cliente->nombre }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asistencias as $asistencia)
        <tr>
            <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') }}</td>
            <td>{{ ucfirst($asistencia->estado) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
