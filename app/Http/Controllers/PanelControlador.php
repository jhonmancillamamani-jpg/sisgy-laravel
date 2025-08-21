<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Membresia;
use App\Models\Asistencia;
use App\Models\Pago;

class PanelControlador extends Controller
{
   public function inicio()
{
    $usuarios = Usuario::count();
    $clientes = Cliente::count();
    $asistencias = Asistencia::count();
    $pagos = Pago::count();
    $membresias = Membresia::count();

    return view('panel.inicio', compact('usuarios', 'clientes', 'asistencias', 'pagos', 'membresias'));
}

}
