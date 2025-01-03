@extends('layouts.app')

@section('content')
	<h1>Crear un producto</h1>
	<form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div class="form-row">
            <label>Descripcion</label>
            <input class="form-control" type="text" name="descripcion" value="{{ old('descripcion') }}" required>
        </div>
        <div class="form-row">
            <label>Precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="precio" value="{{ old('precio') }}" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="form-row">
            <label>ID de las categorías a las que pertenece</label>
            <input class="form-control" type="number" name="idcategorias[]" value="" placeholder="Introduce un ID de categoría">
            <input class="form-control" type="number" name="idcategorias[]" value="" placeholder="Introduce un ID de categoría">
        </div>

        <div class="form-row">

            <label>{{ __('Images') }}</label>
            <div class="custom-file">
                <input type="file" accept="image/*" name="imagenes[]" class="custom-file-input" multiple>
                <label class="custom-file-label">Imagenes del producto</label>
            </div>

        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear el Producto</button>
        </div>
    </form>

@endsection
