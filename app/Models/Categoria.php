<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory, SoftDeletes;

    // protected $with = [
    //     'productos'
    // ];
    protected $fillable = [
        'nombre',
    ] ;

    protected $casts = [
    ];

    //Esta es la relacion n:n de categorias y productos. La categoria tiene productos
    public function productos(){
        return $this->morphToMany(Producto::class, 'productable');
    }


    public function getIdProductosAttribute(){
        return $this->productos()
        ->get()
        ->pluck('id');
    }

    public function getProductosVinculadosAttribute(){
        return $this->productos()
        ->get();
    }
}
