@extends('plantillas.app')
@section('contenido')
<h4>Nueva rutina</h4>
<form method="POST" action="{{ route('rutinas.guardar') }}" class="card card-body border-0 shadow-sm">@csrf
<div class="row g-3">
<div class="col-md-6"><label class="form-label">Cliente</label>
<select name="cliente_id" class="form-select" required>
@foreach($clientes as $c)
<option value="{{ $c->id }}">{{ $c->nombre }} ({{ $c->ci }})</option>
@endforeach
</select>
</div>
<div class="col-md-6"><label class="form-label">Título</label><input name="titulo" class="form-control" required></div>
<div class="col-12"><label class="form-label">Descripción</label><textarea name="descripcion" class="form-control"></textarea></div>
<hr>
<div class="col-md-6"><label class="form-label">Ejercicio (1 ejemplo)</label><input name="ejercicio" class="form-control"></div>
<div class="col-md-2"><label class="form-label">Series</label><input name="series" type="number" class="form-control" value="3"></div>
<div class="col-md-2"><label class="form-label">Repeticiones</label><input name="repeticiones" type="number" class="form-control" value="10"></div>
<div class="col-md-2"><label class="form-label">Peso</label><input name="peso" type="number" step="0.01" class="form-control"></div>
</div>
<div class="mt-3"><button class="btn btn-primary">Guardar</button></div>
</form>
@endsection