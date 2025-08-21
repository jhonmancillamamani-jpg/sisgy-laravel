<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
protected $table = 'clientes';
protected $fillable = ['ci', 'nombre', 'telefono', 'estado'];

public function pagos() {
    return $this->hasMany(Pago::class);
}

public function asistencias() {
    return $this->hasMany(Asistencia::class, 'cliente_id', 'id');
}
public function membresias()
{
    return $this->hasMany(Membresia::class);
}

}
