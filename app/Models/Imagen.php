<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    /** @use HasFactory<\Database\Factories\ImagenFactory> */
    use HasFactory;
    protected $fillable = [
        'id_producto',
        'ruta',
    ] ;

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
