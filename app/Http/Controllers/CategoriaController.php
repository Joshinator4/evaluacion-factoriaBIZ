<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index',)->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $categoria = Categoria::create($request->all());
            foreach ($request->idproductos as $producto) {
                $categoria->productos()->attach($producto);
            }

            return redirect()->route('categorias.index')->withSuccess("Se ha creado correctamente la categoria {$categoria->nombre}");
        }, 3);

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $categorias = Categoria::all();
        // $productos = Producto::whereHas('categorias', function ($categoriaProducto) use ($categoria) {
        //     $categoriaProducto->where('id', $categoria->id);
        // })->get();
        $productos = $categoria->productos_vinculados;

        return view('categorias.show')->with(['productos' => $productos,'categorias' => $categorias, 'nombre' => $categoria->nombre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        return DB::transaction(function () use ($request, $categoria) {
            $categoria->update($request->validated());

            foreach ($request->idproductos as $producto) {
                $categoria->productos()->attach($producto);
            }

            return redirect()->route('categorias.edit', ['categoria'=> $categoria])
            ->withSuccess("Categoría {$categoria->nombre} editada correctamente");
        }, 3);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {

        $categoria->delete();

        return redirect()->route('categorias.index')
        ->withSuccess("La categoría con ID: {$categoria->id} ha sido correctamente eliminada");

    }

    public function desvincularProductoDeCategoriaPorId(Request $request, Categoria $categoria){
        return DB::transaction(function () use ($request, $categoria) {
            $idProducto = $request->idProductoDesvincular;
            $categoria->productos()->detach($idProducto);

            return redirect()->route("categorias.edit", ['categoria'=> $categoria])
            ->withSuccess("Se ha desvinculado el producto con ID{$idProducto} de la categoría {$categoria->nombre}");


        }, 3);
    }

    public function desvincularProductosDeCategoria(Categoria $categoria){
        return DB::transaction(function () use ($categoria) {
            foreach ($categoria->productos as $producto) {
                $categoria->productos()->detach($producto);
            }
            return redirect()->route("categorias.edit",['categoria'=> $categoria])
            ->withSuccess("Se han desvinculado todos los productos de la categoría {$categoria->nombre}");
        }, 3);
    }
}
