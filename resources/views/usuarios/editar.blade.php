@extends('plantillas.app')
@section('contenido')
<h4>Editar usuario</h4>
<form method="POST" action="{{ route('usuarios.actualizar',$usuario) }}" class="card card-body border-0 shadow-sm">@csrf @method('PUT')
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Nombre</label><input name="nombre" class="form-control" value="{{ $usuario->nombre }}" required></div>
<div class="col-md-6"><label class="form-label">Nueva contraseña (opcional)</label><input name="password" type="password" class="form-control"></div>
<div class="col-md-6"><label class="form-label">Rol</label>
<select name="rol" class="form-select" required>
@foreach(['admin','empleado','entrenador'] as $r)
<option value="{{ $r }}" @selected($usuario->rol===$r)>{{ $r }}</option>
@endforeach
</select>
</div>
</div>
<div class="mt-3"><button class="btn btn-primary">Actualizar</button></div>
</form>
@endsection