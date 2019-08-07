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
           <h6>{{$producto->descripcion}}</h6>
           <h5>Marca:</h5>
           <h5>Stock: {{$producto->stock}}</h5>
           <h5>Precio: ${{$producto->precio}}</h5>
        </article>
        <p>
          <a href="/update/{{$producto->id}}" class="btnSubmit" role="button" aria-pressed="true">Modificar</a>
          <form class="" action="/borrarProducto" method="post">
           {{csrf_field()}}
           <input type="hidden" name="id" value="{{$producto->id }}">
           <input type="submit" name="" value="Borrar Producto" class="btnSubmit">
         </form>
        </p>
      </div>
    <div class="col-12 fondo-parrafo cupon">
      <form class="" action="{{ route('login') }}" enctype="multipart/form-data"  method="post">
        <p class="form-row form-row-wide"> <label for="cupon">{{__('Seleccionar archivo')}}<span class="required">*</span></label>
        <input type="file" class="form-control-file" name="cupon" id="cupon"></p>
      </form>
    </div>
  </div>
</div>
  </section>
  </div>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Modificar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="">
          @csrf
          <div class="form-group">
            <label for="nombre">{{__('Nombre')}}<span>*</span></label>
            <input type="producto" class="form-control" id="producto" placeholder="Nombre del producto">
          </div>
        <!--<div class="form-row">
          <div class="form-group col-md-6">
            <label for="categoria">Categoria <span>*</span></label>
            <select id="categoria" name="categoria_id" class="form-control">
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>
          <div class="form-group col-md-6">
          <label for="marca_id">Marca <span>*</span></label>
          <select id="marca_id" name="marca_id" class="form-control">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
          </div>
        </div>-->
        <div class="form-group">
         <label for="descripcion">Descripción <span>*</span></label>
         <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripcion"></textarea>
       </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="precio">Precio<span>*</span></label>
            <input type="text" class="form-control"  name="precio" id="precio" placeholder="Precio" required>
          </div>
          <div class="form-group col-md-6">
          <label for="stock">Stock<span>*</span></label>
          <input type="number" class="form-control" name="stock" value="" placeholder="Stock" required>
          </div>
        </div>
        <div class="form-group">
          <input type="file" name="" value="">
        </div>

      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btnRegister" data-dismiss="modal">Close</button>
            <button type="submit" class="btnSubmit">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>

    </body>

@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.js"></script>
<script src="{{asset('js/fullscreen')}}" defer></script>
@endpush
