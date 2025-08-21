<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Cliente;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsistenciasExport;

class AsistenciasControlador extends Controller
{
   public function index(Request $request)
{
    $query = Asistencia::with('cliente')->orderBy('fecha', 'desc');

    if ($request->filled('inicio')) {
        $query->whereDate('fecha', '>=', $request->inicio);
    }
    if ($request->filled('fin')) {
        $query->whereDate('fecha', '<=', $request->fin);
    }

    $asistencias = $query->paginate(15);

    return view('asistencias.index', compact('asistencias'));
}

    public function crear()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('asistencias.crear', compact('clientes'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
        ]);

        Asistencia::create($request->only('cliente_id', 'fecha'));

        return redirect()->route('asistencias.index')->with('success', 'Asistencia registrada.');
    }

    public function exportarExcel()
    {
        return Excel::download(new AsistenciasExport, 'asistencias.xlsx');
    }
}
