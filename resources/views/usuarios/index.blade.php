@extends('plantillas.app')
@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
<h4>Usuarios</h4>
<a class="btn btn-primary" href="{{ route('usuarios.crear') }}">Nuevo</a>
</div>
<table class="table table-sm table-striped">
<thead><tr><th>ID</th><th>Nombre</th><th>Rol</th><th></th></tr></thead>
<tbody>
@foreach($usuarios as $u)
<tr>
<td>{{ $u->id }}</td>
<td>{{ $u->nombre }}</td>

<td>{{ $u->rol }}</td>
<td class="text-end">
<a class="btn btn-sm btn-outline-secondary" href="{{ route('usuarios.editar',$u) }}">Editar</a>
<form method="POST" action="{{ route('usuarios.eliminar',$u) }}" class="d-inline">@csrf @method('DELETE')
<button class="btn btn-sm btn-outline-danger">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $usuarios->links() }}
@endsection