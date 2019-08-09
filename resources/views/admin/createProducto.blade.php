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
      <h1 class="display-4">Agregar un nuevo producto</h1>
    </div>
    <!-- End -->

    <div class="pb-5 pt-5 mt-5 bodybkg">
      <div class="container">
        <div class="row ">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="row justify-content-center">
              <div class="col-12 col-md-8">
                <form method="post" class="dropzone" enctype="multipart/form-data" action="{{'create'}}">
                @csrf
                <div class="form-group">
                  <label for="nombre">{{__('Nombre')}}<span>*</span></label>
                  <input type="producto" class="form-control" id="producto" name="nombre" placeholder="Nombre del producto">
                </div>

              <div class="form-group">
               <label for="descripcion">{{__('Descripcion')}} <span>*</span></label>
               <textarea name="descripcion" class="form-control" id="descripcion" rows="3" placeholder="Descripcion"></textarea>
             </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="precio">{{__('Precio')}}<span>*</span></label>
                  <input type="text" class="form-control"  name="precio" id="precio" placeholder="Precio" required>
                </div>
                <div class="form-group col-md-6">
                <label for="stock">{{__('Stock')}}<span>*</span></label>
                <input type="number" class="form-control" name="stock" value="" placeholder="Stock" required>
                </div>
              </div>
              <div class="form-group">
              <input name="imagen" id="file-input" type="file" />
            </div>
          </div>
              <div  class="col-12 col-md-4">
                <div class="">
                   <input name="file" type="file" multiple />
                 </div>
              </div>
            <button type="submit" class="btnSubmit">{{__('Agregar')}}</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
@endpush

@push('styles')
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
