@extends('layouts.plantilla')

@section('titulo')
  Detalle
@endsection

@section('content')
  <div class="container">
   <section class="producto-detalle">
       <h2>Producto</h2>
    <div class="row">
      <div class="col-12 col-md-8">
        <div class="col-12">
          <div class="imagen-container">
           <img class="detalle" src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" alt="">
         </div>
        </div>
      </div>
      <div class="col-6 col-md-4 relacion">
        <div class="col-12">
          <div class="imagen-container">
           <img class="detalle"  src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" alt="">
         </div>
       </div>
        <div class="col-12">
           <div class="imagen-container">
            <img class="detalle"  src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" alt="">
          </div>
        </div>
       <div class="col-12">
         <div class="imagen-container">
          <img class="detalle"  src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12 col-md-8 descripcion">
       <article class="producto-descripcion">
        <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
        <h5>Marca:</h5>
        <h5>Stock:</h5>
        <h5>Precio:</h5>
       </article>
       <p>
         <input type="submit" value="Modificar" class="btnSubmit">
         <form class="" action="/borrarProducto" method="post">
          {{csrf_field()}}
          <input type="hidden" name="id" value="">
          <input type="submit" name="" value="Borrar Producto" class="btnSubmit">
        </form>
      </p>

    </div>
    <div class="col-12 col-md-4 cupon">
    <form class="" action="{{ route('login') }}" enctype="multipart/form-data"  method="post">
      <p class="form-row form-row-wide"> <label for="cupon">{{__('Seleccionar archivo')}}<span class="required">*</span></label>
      <input type="file" class="form-control-file" name="cupon" id="cupon"></p>
    </form>
    </div>
  </div>
    <hr>
  </section>
  </div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="{{asset('js/fullscreen')}}" defer></script>
@endpush
