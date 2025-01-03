<div class="card">
    <div class="card">
        <div id="carousel{{ $producto->id }}" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($producto->imagenes as $imagen)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100 card-img-top" src="{{ asset($imagen->ruta) }}" style="object-fit: cover; height: 600px;">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $producto->id }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $producto->id }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <div class="card-body">
        <h4 class="text-right"><strong>{{$producto->precio}}€</strong></h4>
        <h5 class="card-title"><strong>Nombre: </strong>{{$producto->nombre}}</h5>
        <p class="card-text"><strong>Descripción: </strong>{{$producto->descripcion}}</p>
        <p class="card-text"><strong>Categorías: </strong>
            @foreach ($producto->categorias as $categoria)
                {{ $categoria->nombre}}
            @endforeach
        </p>
        <p class="card-text"><strong>Quedan: </strong>{{$producto->stock}}</p>
    </div>
</div>
