@extends('plantillas.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h4 class="mb-3">Iniciar sesión</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.iniciar') }}" class="card card-body border-0 shadow-sm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input name="nombre" type="text" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input name="password" type="password" class="form-control" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>
@endsection
