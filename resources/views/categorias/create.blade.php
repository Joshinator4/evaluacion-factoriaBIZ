@extends('layouts.app')

@section('content')
	<h1>Crear una categoría</h1>
	<form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-row">
            <label>ID de los productos de esta categoria</label>
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.0') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.1') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.2') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.3') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.4') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.5') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.6') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.7') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.8') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.9') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.10') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.11') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.12') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.13') ?? ''}}" placeholder="Introduce un ID de producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.14') ?? ''}}" placeholder="Introduce un ID de producto">
        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear la categoría</button>
        </div>
    </form>

@endsection
