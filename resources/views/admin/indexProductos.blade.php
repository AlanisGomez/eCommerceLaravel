@extends('layouts.plantilla')

@section('titulo')
  Productos
@endsection

@section('content')
<div class="">
<div class="container">
<section class="producto-detalle">
<a href="/admin/create" class="btnSubmit" role="button" aria-pressed="true">Agregar producto</a>
  <div class="filters">
    <div class="ui-group">
      <div class="button-group js-radio-button-group" data-filter-group="categoria">
        <button class="button is-checked" data-filter="">Todo</button>
        <button class="button" data-filter=".Mujer">Mujer</button>
        <button class="button" data-filter=".Hombre">Hombre</button>
        <button class="button" data-filter=".Niños">Niños</button>
      </div>
    </div>
    </div>
<div class="row justify-content-center">
  <div class="col-12 col-md-8">
      <form  action="{{ url('admin/productos/buscar') }}" method="get">
      <div class="p-4">
        <div class="input-group mb-4 border rounded-pill p-2" style="background-color:rgba(255, 255, 255, 0.6);">
             <input class="form-control border-0" name="q"  type="search" aria-describedby="button-addon3"  placeholder="Search" style="background-color:rgba(255, 255, 255, 0.0);" >
          <div class="input-group-append border-0">
            <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fas fa-search mr-2"></i>Buscar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="grid">

</div>
<div class="pt-3">
    <div class="container">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Ver Detalle</th>
                    </tr>
                </thead>
                <tbody>
                  <div class="grid">
                    @foreach ($productos as $producto)
                      <div class="" style="display:none">
                        {{$categoria = App\Categoria::find($producto->categoria_id)}}
                      </div>
                    <tr class="{{$categoria->nombre}}">
                        <td><img src="../../{{ $producto->imagen }}"alt="" width="150" class="img-fluid rounded shadow-sm" style="text-align: center"></td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripción}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->stock}}</td>
                        <td><a href="detalle/{{$producto->id}}" class="text-dark"><i class="fa fa-search"></i></a></td>
                    </tr>
                    @endforeach
                  </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
{{$productos->links()}}
</div>
</section>

@endsection

@push('scripts')
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script>
// external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
itemSelector: '.color-shape'
});

// store filter for each group
var filters = {};

$('.filters').on( 'click', '.button', function( event ) {
var $button = $( event.currentTarget );
// get group key
var $buttonGroup = $button.parents('.button-group');
var filterGroup = $buttonGroup.attr('data-filter-group');
// set filter for group
filters[ filterGroup ] = $button.attr('data-filter');
// combine filters
var filterValue = concatValues( filters );
// set filter for Isotope
$grid.isotope({ filter: filterValue });
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
var $buttonGroup = $( buttonGroup );
$buttonGroup.on( 'click', 'button', function( event ) {
$buttonGroup.find('.is-checked').removeClass('is-checked');
var $button = $( event.currentTarget );
$button.addClass('is-checked');
});
});

// flatten object by concatting values
function concatValues( obj ) {
var value = '';
for ( var prop in obj ) {
value += obj[ prop ];
}
return value;
}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').css('background-image', 'url(../images/tiles-shapes.jpg');
    });
</script>
@endpush
@push('styles')

  <script type="text/javascript">
      $(document).ready(function() {
          $('body').css('background-image', 'url(../images/tiles-shapes.jpg');
      });
  </script>

  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
