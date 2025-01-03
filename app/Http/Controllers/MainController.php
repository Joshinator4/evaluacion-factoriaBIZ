<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;

class MainController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view("main")->with(['productos'=> $productos, 'categorias' => $categorias]);
    }
}
