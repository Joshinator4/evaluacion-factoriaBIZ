@extends('layouts.app')

@section('content')
	<h1>Darse de alta como cliente</h1>
	<form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <label>Nombre y apellidos</label>
            <input class="form-control" type="text" name="nombre_apellidos" value="{{ old('nombre_apellidos') }}" placeholder="Introduce su nombre y apellidos" required>
        </div>
        <div class="form-row">
            <label>Dirección</label>
            <input class="form-control" type="text" name="direccion" value="{{ old('direccion') }}" placeholder="Introduce su dirección" required>
        </div>
        <div class="form-row">
            <label>Dirección de facturación (opcional)</label>
            <input class="form-control" type="text" name="direccion_facturacion" value="{{ old('direccion_facturacion') }}" placeholder="Introduzaca su dirección de facturación">
        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Darse de alta</button>
        </div>
    </form>

@endsection
