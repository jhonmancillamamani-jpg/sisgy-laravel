@extends('plantillas.app')
@section('contenido')

<h3>Registrar Pago</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pagos.guardar') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select name="cliente_id" id="cliente_id" class="form-select" required>
            <option value="">Seleccione un cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="concepto" class="form-label">Concepto</label>
        <input type="text" name="concepto" id="concepto" class="form-control" value="{{ old('concepto') }}" required>
    </div>

    <div class="mb-3">
        <label for="monto" class="form-label">Monto</label>
        <input type="number" name="monto" id="monto" step="0.01" min="0" class="form-control" value="{{ old('monto') }}" required>
    </div>

    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', date('Y-m-d')) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Pago</button>
    <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
