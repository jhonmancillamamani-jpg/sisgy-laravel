<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Cliente::all(['id','nombre','ci','telefono']);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'C.I.', 'Teléfono'];
    }
}
