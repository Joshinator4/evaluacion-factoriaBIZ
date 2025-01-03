<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view("productos.index")->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        return DB::transaction( function () use ($request) {

            $producto = Producto::create($request->all());

            // Recorremos las categorías para asignarlas al producto;
            foreach($request->idcategorias as $categoria){
                $producto->categorias()->attach($categoria);
            }

            //Se guardan las imagenes en la carpeta storage y en la carpeta public
            foreach($request->imagenes as $imagen){

                $producto->imagenes()->create([
                    'ruta' => 'imagenes/' . $imagen->store('productos', 'imagenes')
                ]);

            }

            return redirect()->route('productos.index')->withSuccess("Producto {$producto->nombre} creado correctamente");

        }, 3);


    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show')->with(['producto'=> $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit')->with(['producto'=> $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        return DB::transaction( function () use ($request, $producto) {
            $producto->update($request->validated());

            // Se filtra que si se mandan imagens nuevas, se borren las anteriores y se guarden las nuevas en la carpeta public public
            if ($request->hasFile('imagenes')) {
                foreach($producto->imagenes as $imagen) {
                    $ruta = storage_path("app/public/{$imagen->ruta}");

                    File::delete($ruta);

                    $imagen->delete();
                }
                // Se recorren las imagenes recibidas del request y se crean sus respectivas rutas en la BBDD, en storage y en public
                foreach ($request->imagenes as $imagen) {
                $producto->imagenes()->create([
                    'ruta' => 'imagenes/' . $imagen->store('productos', 'imagenes')
                ]);
                }
            }

            return redirect()->route('productos.edit', ['producto'=> $producto])
            ->withSuccess("El producto con ID:{$producto->id} se ha editado correctamente");
        }, 3);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->withSuccess("El producto con ID{$producto->id} se ha eliminado correctamente");
    }
}
