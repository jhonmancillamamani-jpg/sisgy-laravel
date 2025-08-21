<?php


namespace App\Http\Controllers;


use App\Models\Rutina;
use App\Models\RutinaDetalle;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RutinasControlador extends Controller
{
public function index()
{
$rutinas = Rutina::with('detalles')->orderBy('id','desc')->paginate(10);
return view('rutinas.index', compact('rutinas'));
}


public function crear()
{
$clientes = Cliente::orderBy('nombre')->get();
return view('rutinas.crear', compact('clientes'));
}


public function guardar(Request $request)
{
$request->validate([
'cliente_id' => 'required|exists:clientes,id',
'titulo' => 'required',
]);
DB::transaction(function () use ($request) {
$rutina = Rutina::create($request->only('cliente_id','titulo','descripcion'));
// Crea un detalle ejemplo sin JS
if ($request->filled('ejercicio')) {
RutinaDetalle::create([
'rutina_id' => $rutina->id,
'ejercicio' => $request->input('ejercicio'),
'series' => $request->input('series', 3),
'repeticiones' => $request->input('repeticiones', 10),
'peso' => $request->input('peso'),
]);
}
});
return redirect()->route('rutinas.index')->with('ok','Rutina creada');
}


public function ver(Rutina $rutina)
{
$rutina->load('detalles');
return view('rutinas.ver', compact('rutina'));
}
}