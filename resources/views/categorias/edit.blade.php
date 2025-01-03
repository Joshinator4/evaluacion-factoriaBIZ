@extends('layouts.app')

@section('content')
	<h1>Editar Categoría</h1>
	<form method="POST" action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="{{ old('nombre') ?? $categoria->nombre}}" required>
        </div>

        <div class="form-row">
            <label>Añadir productos a esta Categoría</label>
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.0') ?? ''}}" placeholder="Ingrese el ID del producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.1') ?? ''}}" placeholder="Ingrese el ID del producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.2') ?? ''}}" placeholder="Ingrese el ID del producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.3') ?? ''}}" placeholder="Ingrese el ID del producto">
            <input class="form-control" type="number" name="idproductos[]" value="{{ old('idproductos.4') ?? ''}}" placeholder="Ingrese el ID del producto">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Editar el Producto</button>
        </div>
        <br>
        <div class="form-row">
            <label>ID producto a desvincular</label>
            <input class="form-control" type="number" name="idProductoDesvincular"  placeholder="Ingrese el ID del producto a desvincular">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-warning btn-lg" formaction="{{ route('categorias.desvincularProductoDeCategoriaPorId', ['categoria' => $categoria->id]) }}">Desvincular el producto</button>
        </div><br>
        <div class="form-row">
            <label>Desvincular TODOS los productos de la categoría</label>
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-danger btn-lg" formaction="{{ route('categorias.desvincularProductosDeCategoria', ['categoria' => $categoria->id]) }}">Desvincular todos los productos</button>
        </div>
    </form>

@endsection
