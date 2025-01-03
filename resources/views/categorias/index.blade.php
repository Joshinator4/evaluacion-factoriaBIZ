@extends('layouts.app')

@section('content')
    <h1>Lista de Categorías</h1>

    <a class="btn btn-success mb-3" href="{{route('categorias.create')}}">Crear Categoría</a>

    @empty ($categorias)
        <div class="alert warning">
            La lista de categorias está vacía
        </div>

    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha de creación</th>
                        <th>Fecha de última actualización</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id}}</td>
                            <td>{{ $categoria->nombre}}</td>
                            <td>{{ $categoria->created_at }}</td>
                            <td>{{ $categoria->updated_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-link" href="{{route('categorias.edit', ['categoria'=>$categoria->id])}}">Editar Categoría</a>

                                <!-- se realiza un formulario para poder hacer el DELETE ya que es un metodo falseado de POST.  -->
                                <form method="POST" class="d-inline" action="{{route('categorias.destroy', ['categoria'=>$categoria->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Eliminar Categoría</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty
@endsection
