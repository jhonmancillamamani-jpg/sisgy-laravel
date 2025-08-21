@extends('plantillas.app')
@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4>Rutinas</h4>
@if(in_array(session('usuario.rol'), ['admin','entrenador']))
<a class="btn btn-primary" href="{{ route('rutinas.crear') }}">Nueva</a>
@endif
</div>
<table class="table table-sm table-striped">
<thead><tr><th>ID</th><th>Cliente</th><th>Título</th><th>Creación</th><th></th></tr></thead>
<tbody>
@foreach($rutinas as $r)
<tr>
<td>{{ $r->id }}</td>
<td>{{ $r->cliente_id }}</td>
<td>{{ $r->titulo }}</td>
<td>{{ $r->created_at }}</td>
<td class="text-end"><a class="btn btn-sm btn-outline-secondary" href="{{ route('rutinas.ver',$r) }}">Ver</a></td>
</tr>
@endforeach
</tbody>
</table>
{{ $rutinas->links() }}
@endsection