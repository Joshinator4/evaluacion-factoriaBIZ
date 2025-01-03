@extends('layouts.app')

@section('content')
    <h1>Tus datos de cliente</h1>

    @empty ($cliente)
        <div class="alert warning">
            Todavía no eres cliente
        </div>

    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre de Usuario o nick</th>
                        <th>Nombre y apellidos de cliente</th>
                        <th>Dirección</th>
                        <th>Dirección de facturación</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cliente->user->name}}</td>
                        <td>{{ $cliente->nombre_apellidos}}</td>
                        <td>{{ $cliente->direccion}}</td>
                        <td>{{ $cliente->direccion_facturacion}}</td>
                    </tr>
                </tbody>
            </table>

            <a type="submit" class="btn btn-warning btn-lg" href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}">Editar datos</a>
            <form method="POST" class="d-inline" action="{{route('clientes.destroy', ['cliente'=>$cliente->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg">Darte de baja como cliente</button>
            </form>
        </div>
    @endempty
@endsection
