@extends('layouts.plantilla')

@section('titulo')
  Productos
@endsection

@section('content')
<body class="producto-detalle">

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

  <div class="grid">
  <div class="row">
    <div class="col-12 col-md-3 color-shape man">
      <a href="">
      <div class="card producto" style="width: 100%;">
        <div class="container">
          <div class="img-container" >
            <img src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" class="imagen-producto" alt="...">
          </div>
        </div>
        <div class="card-body">
        <p class="description">Algo</p>
        <hr>
        <h5 class="price">1234</h5>
        </div>
      </div>
      </a>
    </div>

    <div class="col-12 col-md-3 color-shape child">
      <a href="">
      <div class="card producto" style="width: 100%;">
        <div class="container">
          <div class="img-container" >
            <img src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" class="imagen-producto" alt="...">
          </div>
        </div>
        <div class="card-body">
        <p class="description">Algo</p>
        <hr>
        <h5 class="price">1234</h5>
        </div>
      </div>
      </a>
    </div>

    <div class="col-12 col-md-3 color-shape woman">
      <a href="">
      <div class="card producto" style="width: 100%;">
        <div class="container">
          <div class="img-container" >
            <img src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" class="imagen-producto" alt="...">
          </div>
        </div>
        <div class="card-body">
        <p class="description">Algo</p>
        <hr>
        <h5 class="price">1234</h5>
        </div>
      </div>
      </a>
    </div>

    <div class="col-12 col-md-3 color-shape man">
      <a href="">
      <div class="card producto" style="width: 100%;">
        <div class="container">
          <div class="img-container" >
            <img src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" class="imagen-producto" alt="...">
          </div>
        </div>
        <div class="card-body">
        <p class="description">Algo</p>
        <hr>
        <h5 class="price">1234</h5>
        </div>
      </div>
      </a>
    </div>

    <div class="col-12 col-md-3  color-shape woman">
      <a href="">
      <div class="card producto" style="width: 100%;">
        <div class="container">
          <div class="img-container" >
            <img src="https://www.interactius.com/wp-content/uploads/2017/09/foto3.png" class="imagen-producto" alt="...">
          </div>
        </div>
        <div class="card-body">
        <p class="description">Algo</p>
        <hr>
        <h5 class="price">1234</h5>
        </div>
      </div>
      </a>
    </div>
  </div>
  </div>
</section>
</div>

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
