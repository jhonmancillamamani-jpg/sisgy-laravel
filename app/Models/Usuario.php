<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
use HasFactory;
protected $table = 'usuarios';
protected $fillable = ['nombre',  'password', 'rol']; // rol: admin|empleado|entrenador
protected $hidden = ['password'];

  protected $casts = [
        'password' => 'hashed',
    ];

    public function rol()
{
    return $this->belongsTo(Rol::class);
}

}