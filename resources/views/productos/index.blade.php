@extends('layouts.app')

@section('content')
    <h1>Lista de Productos</h1>

    <a class="btn btn-success mb-3" href="{{route('productos.create')}}">Crear Producto</a>

    @empty ($productos)
        <div class="alert warning">
            La lista de productos está vacía
        </div>

    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categorias</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id}}</td>
                            <td>{{ $producto->nombre}}</td>
                            <td>{{ $producto->descripcion}}</td>
                            <td>{{ $producto->precio}}</td>
                            <td>{{ $producto->stock}}</td>
                            <td>
                                @foreach ($producto->categorias as $categoria)
                                    {{ $categoria->nombre}}
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-link" href="{{route('productos.show', ['producto'=>$producto->id])}}">Mostrar Producto</a>

                                <a class="btn btn-link" href="{{route('productos.edit', ['producto'=>$producto->id])}}">Editar Producto</a>

                                <!-- se realiza un formulario para poder hacer el DELETE ya que es un metodo falseado de POST.  -->
                                <form method="POST" class="d-inline" action="{{route('productos.destroy', ['producto'=>$producto->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Borrar el producto</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty
@endsection
