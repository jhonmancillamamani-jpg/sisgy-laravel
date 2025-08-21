<?php


namespace App\Http\Controllers;


use App\Models\Pago;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PagosControlador extends Controller
{
public function index(Request $request)
{
    $query = Pago::with('cliente')->orderBy('fecha','desc');

    if ($request->filled('inicio')) {
        $query->whereDate('fecha', '>=', $request->inicio);
    }
    if ($request->filled('fin')) {
        $query->whereDate('fecha', '<=', $request->fin);
    }

    $pagos = $query->paginate(15);

    return view('pagos.index', compact('pagos'));
}


public function crear()
{
$clientes = Cliente::orderBy('nombre')->get();
return view('pagos.crear', compact('clientes'));
}


public function guardar(Request $request)
{
$request->validate([
'cliente_id' => 'required|exists:clientes,id',
'concepto' => 'required',
'monto' => 'required|numeric',
'fecha' => 'required|date',
]);
Pago::create($request->only('cliente_id','concepto','monto','fecha'));
return redirect()->route('pagos.index')->with('ok','Pago registrado');
}

public function reporte()
{
    $pagos = Pago::with('cliente')->orderBy('fecha', 'desc')->get();

    $pdf = Pdf::loadView('pagos.reporte', compact('pagos'))->setPaper('A4', 'portrait');

    return $pdf->stream('reporte_pagos.pdf'); // También puedes usar download()
}
public function recibo(Pago $pago)
{
    $pdf = Pdf::loadView('pagos.recibo', compact('pago'))->setPaper('A5', 'portrait');
    return $pdf->stream("recibo_pago_{$pago->id}.pdf");
}

}