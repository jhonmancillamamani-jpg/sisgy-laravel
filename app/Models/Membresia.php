<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Membresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function estaActiva()
    {
        $hoy = Carbon::today();
        return $hoy->between($this->fecha_inicio, $this->fecha_fin);
    }
}
