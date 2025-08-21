<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;


class SesionAutenticada
{
public function handle(Request $request, Closure $next, ...$roles)
{
$usuario = $request->session()->get('usuario');
if (!$usuario) {
return redirect()->route('login.forma')->with('error', 'Inicia sesión.');
}
if (!empty($roles) && !in_array($usuario['rol'], $roles)) {
abort(403, 'No autorizado');
}
return $next($request);
}
}