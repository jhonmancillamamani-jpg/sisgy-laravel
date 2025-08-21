<?php


namespace App\Http\Controllers;


use App\Models\Cliente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientesExport;

class ClientesControlador extends Controller
{

    public function exportarExcel()
{
    return Excel::download(new ClientesExport, 'clientes.xlsx');
}
public function index()
{
$clientes = Cliente::orderBy('id','desc')->paginate(10);
return view('clientes.index', compact('clientes'));
}


public function crear()
{
return view('clientes.crear');
}


public function guardar(Request $request)
{
$request->validate([
'ci' => 'required|unique:clientes,ci',
'nombre' => 'required',
]);
Cliente::create($request->only('ci','nombre','telefono','estado'));
return redirect()->route('clientes.index')->with('ok','Cliente guardado');
}


public function editar(Cliente $cliente)
{
return view('clientes.editar', compact('cliente'));
}


public function actualizar(Request $request, Cliente $cliente)
{
$request->validate([
'ci' => 'required|unique:clientes,ci,'.$cliente->id,
'nombre' => 'required',
]);
$cliente->update($request->only('ci','nombre','telefono','estado'));
return redirect()->route('clientes.index')->with('ok','Cliente actualizado');
}


public function eliminar(Cliente $cliente)
{
$cliente->delete();
return redirect()->route('clientes.index')->with('ok','Cliente eliminado');
}

public function historialPagos($id)
{
    $cliente = Cliente::findOrFail($id);
    $pagos = $cliente->pagos()->orderBy('fecha','desc')->get();

    return view('clientes.historial_pagos', compact('cliente','pagos'));
}

public function historialAsistencias($id)
{
    $cliente = Cliente::findOrFail($id);
    $asistencias = $cliente->asistencias()->orderBy('fecha','desc')->get();

    return view('clientes.historial_asistencias', compact('cliente','asistencias'));
}
}