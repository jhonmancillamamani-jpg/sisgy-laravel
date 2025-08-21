<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Rutina extends Model
{
protected $table = 'rutinas';
protected $fillable = ['cliente_id', 'titulo', 'descripcion'];


public function detalles()
{
return $this->hasMany(RutinaDetalle::class);
}
}