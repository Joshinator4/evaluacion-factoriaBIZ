@extends('layouts.app')

@section('content')
	<h1>Editar producto</h1>
	<form method="POST" action="{{ route('productos.update', ['producto' => $producto->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') ?? $producto->nombre}}" required>
        </div>
        <div class="form-row">
            <label>Descripcion</label>
            <input class="form-control" type="text" name="descripcion" value="{{ old('descripcion') ?? $producto->descripcion}}" required>
        </div>
        <div class="form-row">
            <label>Precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="precio" value="{{ old('precio') ?? $producto->precio}}" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') ?? $producto->stock}}" required>
        </div>

        <div class="form-row">

            <label>{{ __('Imagenes') }}</label>
            <div class="custom-file">
                <input type="file" accept="image/*" name="imagenes[]" class="custom-file-input" multiple>
                <label class="custom-file-label">Imagenes del producto</label>
            </div>

        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Editar el Producto</button>
        </div>
    </form>

@endsection
