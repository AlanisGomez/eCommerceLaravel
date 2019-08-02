@extends('layouts.plantilla')

@section('content')
  <body>
  <div class="container">
  <section class="colecciones" id="">
    <div class="row">
      @foreach($productos as $producto)
  <div class="col-12 col-md-3">
    <a href="productos/{{/*$producto->id*/}}">
    <div class="card producto" style="width: 100%;">
      <div class="container">
        <div class="img-container" >
          <img src="/storage/{{/*$producto->ProductoFoto*/}}" class="imagen-producto" alt="...">
        </div>
      </div>
      <div class="card-body">
      <p class="description">{{/*$producto->ProductoNombre*/}}</p>
      <hr>
      <h5 class="price">{{/*$producto->ProductoPrecio*/}}</h5>
      </div>
    </div>
    </a>
  </div>
      @endforeach
    </div>
    </section>
  </div>
</body>
{{$productos->link()}}
@endsection
