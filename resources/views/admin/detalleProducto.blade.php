@extends('layouts.plantilla')

@section('titulo')
  Detalle
@endsection

@section('content')

  <div class="px-4 px-lg-0">
    <!-- For demo purpose -->
    <div class="container pt-5 text-center">
      <h1 class="display-4">Detalle del producto</h1>
      <p class="lead mb-0">Editar/Borrar</p>
    </div>
    <!-- End -->

    <div class="pb-5 pt-5 mt-5 bodybkg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5  bg-white fondo-detalle rounded shadow-sm mb-5">
          <div class="row">
            <div class="col-12 col-md-7">
              <div class="imagen-container">
                 <img class="detalle" src="{{$producto->imagen}}" alt="">
               </div>
              </div>
            <div class="col-12 col-md-5 relacion">
              <div class="col-12">
                <article class="producto-descripcion">
                 <h2 class="display-4">{{$producto->nombre}}</h2>
                 <h6>{{$producto->descripcion}}</h6>
                 <h5>Marca:</h5>
                 <h5>Stock: {{$producto->stock}}</h5>
                 <h5>Precio: ${{$producto->precio}}</h5>
              </article>
              <p>
                <a href="/admin/update/{{$producto->id}}" class="btnSubmit" role="button" aria-pressed="true">Modificar</a>
                <form class="" action="{{route('borrar')}}" method="post">
                 {{csrf_field()}}
                 <input type="hidden" name="id" value="{{$producto->id }}">
                 <input type="submit" name="" value="Borrar Producto" class="btnSubmit">
               </form>
              </p>
            </div>
            <hr>
          <div class="col-12 cupon">
            <h3>Agregar imagen de cupón</h3>
            <form class="" action="{{ route('login') }}" enctype="multipart/form-data"  method="post">
              <p class="form-row form-row-wide">
             <label for="cupon">{{__('Seleccionar archivo')}}<span class="required">*</span></label>
              <input type="file" class="form-control-file" name="cupon" id="cupon"></p>
            </form>
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="{{asset('js/fullscreen')}}" defer></script>
@endpush
@push('styles')
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
