<?php

use App\Http\Controllers\{
    AutenticacionControlador,
    PanelControlador,
    UsuariosControlador,
    ClientesControlador,
    PagosControlador,
    AsistenciasControlador,
    RutinasControlador,
    MembresiaControlador
};
use Illuminate\Support\Facades\Route;

// Ruta principal redirecciona al login
Route::get('/', function() {
    return redirect()->route('login.forma');
});

// Autenticación (login/logout)
Route::get('/login', [AutenticacionControlador::class, 'forma'])->name('login.forma');
Route::post('/login', [AutenticacionControlador::class, 'iniciar'])->name('login.iniciar');
Route::post('/salir', [AutenticacionControlador::class, 'salir'])->name('login.salir');

// Rutas protegidas (requieren sesión)
Route::middleware(['sesion'])->group(function () {

    // Panel principal
    Route::get('/panel', [PanelControlador::class, 'inicio'])->name('panel.inicio');

    // Usuarios (solo admin)
    Route::middleware('sesion:admin')->prefix('usuarios')->group(function () {
        Route::get('/', [UsuariosControlador::class,'index'])->name('usuarios.index');
        Route::get('/crear', [UsuariosControlador::class,'crear'])->name('usuarios.crear');
        Route::post('/', [UsuariosControlador::class,'guardar'])->name('usuarios.guardar');
        Route::get('/{usuario}/editar', [UsuariosControlador::class,'editar'])->name('usuarios.editar');
        Route::put('/{usuario}', [UsuariosControlador::class,'actualizar'])->name('usuarios.actualizar');
        Route::delete('/{usuario}', [UsuariosControlador::class,'eliminar'])->name('usuarios.eliminar');
    });

    // Clientes (admin y empleado CRUD, entrenador solo lectura)
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClientesControlador::class,'index'])->name('clientes.index');
        Route::get('/exportar', [ClientesControlador::class,'exportarExcel'])->name('clientes.exportar');

        Route::middleware('sesion:admin,empleado')->group(function () {
            Route::get('/crear', [ClientesControlador::class,'crear'])->name('clientes.crear');
            Route::post('/', [ClientesControlador::class,'guardar'])->name('clientes.guardar');
            Route::get('/{cliente}/editar', [ClientesControlador::class,'editar'])->name('clientes.editar');
            Route::put('/{cliente}', [ClientesControlador::class,'actualizar'])->name('clientes.actualizar');
            Route::delete('/{cliente}', [ClientesControlador::class,'eliminar'])->name('clientes.eliminar');
            Route::get('/{cliente}/historial-pagos', [ClientesControlador::class,'historialPagos'])->name('clientes.historial.pagos');
            Route::get('/{cliente}/historial-asistencias', [ClientesControlador::class,'historialAsistencias'])->name('clientes.historial.asistencias');
        });
    });

    // Pagos (admin y empleado)
    Route::middleware('sesion:admin,empleado')->prefix('pagos')->group(function () {
        Route::get('/', [PagosControlador::class,'index'])->name('pagos.index');
        Route::get('/crear', [PagosControlador::class,'crear'])->name('pagos.crear');
        Route::post('/', [PagosControlador::class,'guardar'])->name('pagos.guardar');
        Route::get('/reporte', [PagosControlador::class,'reporte'])->name('pagos.reporte');
        Route::get('/{pago}/recibo', [PagosControlador::class,'recibo'])->name('pagos.recibo');
        Route::get('/exportar', [PagosControlador::class,'exportarExcel'])->name('pagos.exportar');
      Route::get('/pagos/{pago}/recibo', [PagosControlador::class, 'recibo'])->name('pagos.recibo');

      });

    // Asistencias (admin, empleado, entrenador)
    Route::prefix('asistencias')->group(function () {
        Route::get('/', [AsistenciasControlador::class,'index'])->name('asistencias.index');
        Route::get('/crear', [AsistenciasControlador::class,'crear'])->name('asistencias.crear');
        Route::post('/', [AsistenciasControlador::class,'guardar'])->name('asistencias.guardar');
        Route::get('/exportar', [AsistenciasControlador::class,'exportarExcel'])->name('asistencias.exportar');
    });

    // Rutinas (admin y entrenador)
    Route::prefix('rutinas')->group(function () {
 Route::get('/rutinas', [RutinasControlador::class, 'index'])->name('rutinas.index');
Route::get('/rutinas/crear', [RutinasControlador::class, 'crear'])->name('rutinas.crear');
Route::post('/rutinas', [RutinasControlador::class, 'guardar'])->name('rutinas.guardar');
Route::get('/rutinas/{rutina}/editar', [RutinasControlador::class, 'editar'])->name('rutinas.editar');
Route::put('/rutinas/{rutina}', [RutinasControlador::class, 'actualizar'])->name('rutinas.actualizar');
Route::delete('/rutinas/{rutina}', [RutinasControlador::class, 'eliminar'])->name('rutinas.eliminar');
 });

    // Membresías (admin y empleado)
    Route::middleware('sesion:admin,empleado')->prefix('membresias')->group(function () {
        Route::get('/', [MembresiaControlador::class, 'index'])->name('membresias.index');
        Route::get('/crear', [MembresiaControlador::class, 'create'])->name('membresias.crear');
        Route::post('/', [MembresiaControlador::class, 'store'])->name('membresias.store');
        Route::get('/{membresia}/editar', [MembresiaControlador::class, 'edit'])->name('membresias.editar');
        Route::put('/{membresia}', [MembresiaControlador::class, 'update'])->name('membresias.update');
        Route::delete('/{membresia}', [MembresiaControlador::class, 'destroy'])->name('membresias.eliminar');
    });
});
