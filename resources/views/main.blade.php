@extends('layouts.app')

@section('content')

	<h1 class="text-center">Bienvenido</h1>

    <div class="container-fluid flex-container">
        <!-- Submenú de Categorías -->
        <div class="sidebar">
            <h2>Categorías</h2>
            <ul>
                @foreach ($categorias as $categoria)
                    <li><a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}">{{ $categoria->nombre }}</a></li>
                @endforeach
            </ul>
        </div>

    @empty($productos)
        <div class="alert alert-danger">
            <strong>No hay productos todavía!</strong>
        </div>
    @else
        <div class="row">

            @foreach ($productos as $producto)
                <div class="col-3">
                    <!--ASI incluimos componentes de blade para reutilizar código -->
                    @include('components.producto')
                </div>
            @endforeach

        </div>
    </div>
    @endempty
@endsection
