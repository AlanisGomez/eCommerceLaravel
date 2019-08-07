@extends('layouts.plantilla')

@section('titulo')
  Detalle
@endsection

@section('content')
  <body class="producto-detalle">
  <div class="container">
   <section class="producto-detalle">
    <div class="row">
      <div class="col-12 col-md-8">
        <div class="col-12 fondo-parrafo">
          <h2>Producto</h2>
          <div class="imagen-container">
           <img class="detalle" src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" alt="">
         </div>
        </div>
      </div>
      <div class="col-6 col-md-4 relacion">
        <div class="col-12 fondo-parrafo">
          <article class="producto-descripcion">
           <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
           <h5>Marca:</h5>
           <h5>Stock:</h5>
           <h5>Precio:</h5>
        </article>
        <p>
          <p>
            <input type="submit" value="Agregar al carrito" class="btnSubmit">
          </p>
        </p>
      </div>
    <div class="col-12 fondo-parrafo cupon">
      <img src="https://cdn.blogdechollos.com/600x0/blogdechollos/2015/06/Cdigo-descuento-del-10-en-Rakuten-cdigos-descuento-Rakuten-ofertas-Rakuten-rebajas-Rakuten-promociones-Rakuten.jpg" class="cupon" alt="">
      </form>
    </div>
  </div>
  </div>
  </section>
  </div>

  <section class="more-products">
    <div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2, "wrapAround": true, "autoPlay": 2500  }'>
      <img class="carousel-image" data-flickity-lazyload="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" />
      <img class="carousel-image" data-flickity-lazyload="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" />
      <img class="carousel-image" data-flickity-lazyload="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" />
      <img class="carousel-image" data-flickity-lazyload="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" />
    </div>
  </section>


@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="{{asset('js/fullscreen')}}" defer></script>
@endpush
