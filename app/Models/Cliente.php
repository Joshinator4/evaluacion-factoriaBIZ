<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_usuario',
        'nombre_apellidos',
        'direccion',
        'direccion_facturacion',
    ] ;

    //Esto es la relacion 1:1 de cliente con el usuario. Un cliente pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

}
