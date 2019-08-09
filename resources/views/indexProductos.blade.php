@extends('layouts.plantilla')

@section('titulo')
  Productos
@endsection

@section('content')
<body class="productos">
<div class="container">
<section class="producto-detalle">

  <div class="filters">
    <div class="ui-group">
      <div class="button-group js-radio-button-group" data-filter-group="categoria">
        <button class="button is-checked" data-filter="">Todo</button>
        <button class="button" data-filter=".woman">Mujer</button>
        <button class="button" data-filter=".man">Hombre</button>
        <button class="button" data-filter=".child">Niños</button>
      </div>
    </div>
    </div>
    <form class="card card-sm" action="{{ url('customer/productos/buscar') }}" method="get">
         <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                   <i class="fas fa-search h4 text-body"></i>
                </div>
                                   <!--end of col-->
                   <div class="col">
                 <input class="form-control form-control-lg form-control-borderless"name="q"  type="search" placeholder="Search topics or keywords">
                   </div>
                                   <!--end of col-->
             <div class="col-auto">
             <button class="btn btn-lg btn-success" type="submit">Search</button>
             </div>         <!--end of col-->
               </div>
    </form>

  <div class="grid">
  <div class="row">
    @foreach ($productos as $producto)
      <div class="col-12 col-md-3 color-shape man">
        <a href="/customer/detalle/{{$producto->id}}">
        <div class="card producto" style="width: 100%;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
          <div class="container">
            <div class="img-container" >
              <img src="{{$producto->imagen}}" class="imagen-producto" alt="...">
            </div>
          </div>
          <div class="card-body">
          <p class="description">{{$producto->nombre}}</p>
          <hr>
          <h5 class="price">${{$producto->precio}}</h5>
          </div>
        </div>
        </a>
        <div class="addCartBtnCell">
          <a href="{{ route('product.addToCart', ['id' => $producto->id]) }}" class="description addCartBtnTxt">Agregar al carrito
            <i class="fa fa-shopping-cart" aria-hidden="true" style="padding-left: 10px;">
            </i>
          </a>
          </div>
      </div>
    @endforeach
  </div>
</div>
</section>
</div>
{{$productos->links()}}
</body>
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

@endpush
