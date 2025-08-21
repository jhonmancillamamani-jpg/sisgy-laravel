@extends('plantillas.app')
@section('contenido')

<h3>Estadísticas</h3>
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3 bg-primary text-white">
            <h5>Usuarios</h5>
            <h2>{{ $usuarios }}</h2>
            <a href="{{ route('usuarios.index') }}" class="btn btn-light btn-sm mt-2">Ver Usuarios</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3 bg-success text-white">
            <h5>Clientes</h5>
            <h2>{{ $clientes }}</h2>
            <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm mt-2">Ver Clientes</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3 bg-warning text-dark">
            <h5>Asistencias</h5>
            <h2>{{ $asistencias }}</h2>
            <a href="{{ route('asistencias.index') }}" class="btn btn-dark btn-sm mt-2">Ver Asistencias</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3 bg-danger text-white">
            <h5>Pagos</h5>
            <h2>{{ $pagos }}</h2>
            <a href="{{ route('pagos.index') }}" class="btn btn-light btn-sm mt-2">Ver Pagos</a>
        </div>
    </div>

    {{-- Nueva tarjeta Membresías --}}
    <div class="col-md-3">
        <div class="card text-center shadow-sm p-3 bg-info text-white">
            <h5>Membresías</h5>
            <h2>{{ $membresias }}</h2>
            <a href="{{ route('membresias.index') }}" class="btn btn-light btn-sm mt-2">Ver Membresías</a>
        </div>
    </div>

</div>

<h3>Accesos Rápidos</h3>
<div class="row g-3">
    <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="{{ route('clientes.index') }}">Clientes</a></div>
    <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="{{ route('pagos.index') }}">Pagos</a></div>
    <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="{{ route('asistencias.index') }}">Asistencias</a></div>
    <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="{{ route('rutinas.index') }}">Rutinas</a></div>
    <div class="col-md-3"><a class="btn btn-outline-info w-100" href="{{ route('membresias.index') }}">Membresías</a></div>
    @if(session('usuario.rol')==='admin')
    <div class="col-md-3"><a class="btn btn-warning w-100" href="{{ route('usuarios.index') }}">Usuarios</a></div>
    @endif
</div>

@endsection
