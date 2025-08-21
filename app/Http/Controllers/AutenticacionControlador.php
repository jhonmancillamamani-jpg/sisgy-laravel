<?php


namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AutenticacionControlador extends Controller
{
public function forma()
{
return view('autenticacion.iniciar');
}


public function iniciar(Request $request)
{
$request->validate([
    'nombre' => 'required|string',
    'password' => 'required|string|min:6',
]);

$u = Usuario::where('nombre', $request->nombre)->first();
if (!$u || !Hash::check($request->password, $u->password)) {
return back()->with('error', 'Credenciales inválidas');
}
$request->session()->put('usuario', [
'id' => $u->id,
'nombre' => $u->nombre,
'rol' => $u->rol,
]);
return redirect()->route('panel.inicio');
}


public function salir(Request $request)
{
$request->session()->forget('usuario');
return redirect()->route('login.forma');
}
}