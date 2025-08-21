<?php

namespace App\Exports;

use App\Models\Asistencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsistenciasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Asistencia::with('cliente')
            ->get()
            ->map(function($asistencia){
                return [
                    'ID' => $asistencia->id,
                    'Cliente' => $asistencia->cliente->nombre,
                    'Fecha' => $asistencia->fecha->format('Y-m-d'),
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Cliente', 'Fecha'];
    }
}
