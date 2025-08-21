@extends('plantillas.app')

@section('contenido')
<h3>Editar Pago</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pagos.actualizar', $pago) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="cliente_id" class="form-control" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id', $pago->cliente_id) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Monto</label>
        <input type="number" step="0.01" name="monto" value="{{ old('monto', $pago->monto) }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha', $pago->fecha->format('Y-m-d')) }}" class="form-control" required>
    </div>
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
