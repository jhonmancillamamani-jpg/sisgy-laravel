<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembresiaRequest;
use App\Models\Membresia;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembresiaControlador extends Controller
{
    public function index(Request $request)
    {
        $query = Membresia::with('cliente');

        // Filtros opcionales
        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', $request->cliente_id);
        }
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $membresias = $query->paginate(10);
        $clientes = Cliente::all();

        return view('membresias.index', compact('membresias', 'clientes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('membresias.crear', compact('clientes'));
    }

    public function store(MembresiaRequest $request)
    {
        $inicio = Carbon::parse($request->fecha_inicio);
        $fin = match ($request->tipo) {
            'dia' => $inicio->copy()->addDay(),
            '15dias' => $inicio->copy()->addDays(15),
            'mes' => $inicio->copy()->addMonth(),
        };

        Membresia::create([
            'cliente_id' => $request->cliente_id,
            'tipo' => $request->tipo,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin,
        ]);

        return redirect()->route('membresias.index')->with('success', 'Membresía creada correctamente.');
    }

    public function edit(Membresia $membresia)
    {
        $clientes = Cliente::all();
        return view('membresias.editar', compact('membresia', 'clientes'));
    }

    public function update(MembresiaRequest $request, Membresia $membresia)
    {
        $inicio = Carbon::parse($request->fecha_inicio);
        $fin = match ($request->tipo) {
            'dia' => $inicio->copy()->addDay(),
            '15dias' => $inicio->copy()->addDays(15),
            'mes' => $inicio->copy()->addMonth(),
        };

        $membresia->update([
            'cliente_id' => $request->cliente_id,
            'tipo' => $request->tipo,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin,
        ]);

        return redirect()->route('membresias.index')->with('success', 'Membresía actualizada correctamente.');
    }

    public function destroy(Membresia $membresia)
    {
        $membresia->delete();
        return redirect()->route('membresias.index')->with('success', 'Membresía eliminada correctamente.');
    }
}
