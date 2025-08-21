@extends('plantillas.app')
@section('contenido')
<h4>Nuevo usuario</h4>
<form method="POST" action="{{ route('usuarios.guardar') }}" class="card card-body border-0 shadow-sm">@csrf
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Nombre</label><input name="nombre" class="form-control" required></div>
<div class="col-md-6"><label class="form-label">Contraseña</label><input name="password" type="password" class="form-control" required></div>
<div class="col-md-6"><label class="form-label">Rol</label>
<select name="rol" class="form-select" required>
<option value="admin">admin</option>
<option value="empleado">empleado</option>
<option value="entrenador">entrenador</option>
</select>
</div>
</div>
<div class="mt-3"><button class="btn btn-primary">Guardar</button></div>
</form>
@endsection