<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name') }}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light border-bottom mb-3">
<div class="container-fluid">
<a class="navbar-brand" href="{{ route('panel.inicio') }}">{{ config('app.name') }}</a>
@php($u = session('usuario'))
@if($u)
<div class="d-flex align-items-center gap-3">
<span class="text-muted small">{{ $u['nombre'] }} ({{ $u['rol'] }})</span>
<form method="POST" action="{{ route('login.salir') }}">@csrf<button class="btn btn-outline-secondary btn-sm">Salir</button></form>
</div>
@endif
</div>
</nav>
<main class="container">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('ok'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('ok') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{ $slot ?? '' }}
    @yield('contenido')
</main>

</body>
</html>