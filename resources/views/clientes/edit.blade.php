@extends('layouts.app')

@section('content')
	<h1>Editar datos de cliente</h1>
	<form method="POST" action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Nombre y apellidos</label>
            <input class="form-control" type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos') ?? $cliente->nombre_apellidos}}" required>
        </div>
        <div class="form-row">
            <label>Dirección</label>
            <input class="form-control" type="text" name="direccion" value="{{ old('direccion') ?? $cliente->direccion}}" required>
        </div>
        <div class="form-row">
            <label>Dirección de facturación (opcional)</label>
            <input class="form-control" type="text" name="direccion_facturacion" value="{{ old('direccion_facturacion') ?? $cliente->direccion_facturacion}}">
        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Enviar datos</button>
        </div>
    </form>

@endsection
