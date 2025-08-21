<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class RutinaDetalle extends Model
{
protected $table = 'rutina_detalles';
protected $fillable = ['rutina_id', 'ejercicio', 'series', 'repeticiones', 'peso'];
}