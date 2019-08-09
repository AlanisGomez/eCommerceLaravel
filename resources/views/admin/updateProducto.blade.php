@extends('layouts.plantilla')

@section('title')
  Crear Producto
@endsection
@section('content')
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
       <li>{{$error}}</li>
    </ul>
 @endforeach
  @endif

    <div class="px-4 px-lg-0">
      <!-- For demo purpose -->
      <div class="container pt-5 text-center">
        <h1 class="display-4">Producto {{$producto->nombre}}</h1>
        <p class="lead mb-0">Modificar</p>
      </div>
      <!-- End -->

      <div class="pb-5 pt-5 mt-5 bodybkg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 p-5  bg-white fondo-detalle rounded shadow-sm mb-5">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8">
              <form method="post" enctype="multipart/form-data" action="/admin/update/{{$producto->id}}">
              @csrf
              <div class="form-group">
                <label for="nombre">{{__('Nombre')}}<span>*</span></label>
                <input type="producto" class="form-control" id="producto" name="nombre" placeholder="{{$producto->nombre}}">
              </div>
            <div class="form-group">
             <label for="descripcion">{{__('Descripcion')}} <span>*</span></label>
             <textarea name="descripcion" class="form-control" id="descripcion" rows="3" placeholder="{{$producto->descripcion}}"></textarea>
           </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="precio">{{__('Precio')}}<span>*</span></label>
                <input type="text" class="form-control"  name="precio" id="precio" placeholder="{{$producto->precio}}" required>
              </div>
              <div class="form-group col-md-6">
              <label for="stock">{{__('Stock')}}<span>*</span></label>
              <input type="number" class="form-control" name="stock" value="" placeholder="{{$producto->stock}}" required>
              </div>
            </div>
            <div class="form-group">
              <input type="file" name="imagen" value="">
            </div>
            </div>
            <div  class="col-12 col-md-4 upload-file">
            </div>
            <button type="submit" class="btnSubmit">{{__('Guardar')}}</button>
          </form>
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
