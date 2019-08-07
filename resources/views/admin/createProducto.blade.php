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
  <body class="create">
  <div class="container">
    <section class="create">
      <div class="row justify-content-center">
      <div class="col-12">
          <h1 class="text-center">Agregar producto</h1>
      </div>
    <div class="col-12 col-md-8">
      <form method="post" enctype="multipart/form-data" action="/create">
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
      <input type="file" name="foto" value="">
    </div>
    <button type="submit" class="btnSubmit">{{__('Agregar')}}</button>
  </form>
  </div>
</section>
  </div>

</div>
  </body>
@endsection
