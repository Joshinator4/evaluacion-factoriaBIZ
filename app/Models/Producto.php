<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory,  SoftDeletes;

    protected $with = [
        'categorias'
    ];

    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio',
    ] ;

    protected $casts = [

    ];

    public function categorias(){
        return $this->morphedByMany(Categoria::class,'productable');
    }

    public function imagenes(){
        return $this->hasMany(Imagen::class);
    }
}
