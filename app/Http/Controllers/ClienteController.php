<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();

            if($request->direccion_facturacion == null){
                $cliente = $user->cliente()->create([
                    'nombre_apellidos' => $request->nombre_apellidos,
                    'direccion' => $request->direccion,
                    'direccion_facturacion' => $request->direccion,
                ]);
            }else{
                $cliente = $user->cliente()->create($request->all());
            }

            return redirect()
            ->route("clientes.show", ['cliente' => $cliente])
            ->withSuccess("Te has dado de alta como cliente correctamente. ¡Bienvenido a FactoriaBIZ!");
        },3);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view("clientes.index")->with("cliente", $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view("clientes.edit")->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        return DB::transaction(function () use ($request, $cliente) {
            if($request->direccion_facturacion == null){
                $cliente->update([
                    'nombre_apellidos' => $request->nombre_apellidos,
                    'direccion' => $request->direccion,
                    'direccion_facturacion' => $request->direccion,
                ]);
            }else{
                $cliente->update($request->all());
            }
            return redirect()
            ->route('clientes.show', ['cliente'=> $cliente])
            ->withSuccess("Tus datos han sido editados");
        },3);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('main.index')
        ->withSuccess("Se te ha eliminado como cliente");
    }
}
