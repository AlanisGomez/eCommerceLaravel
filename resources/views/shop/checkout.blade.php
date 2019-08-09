@extends('layouts.plantilla')

@section('titulo')
    Finalizar Compra
@endsection

@section('content')

  <div class="px-4 px-lg-0">

    <!-- CABECERA -->
    <div class="container pt-5 text-center">
      <h1 class="display-4">Finalizar Compra</h1>
      <p class="lead mb-0">¡Ya casi terminamos!</p>
    </div>
    <!-- FIN -->

    <div class="pb-5 pt-5 mt-5 bodybkg">
      <div class="container">
        <div class="row py-5 p-4 bg-white rounded shadow-sm justify-content-center">
          <div class="col-lg-10">
      <form action="{{ route('checkout') }}" method="post" id="checkout-form">
        <div class="col-lg-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Datos de Pago</div>
          <div class="pt-3">
            <p class="form-row form-row-wide">
              <label for="nombre" class="text-muted">Nombre y Apellido</label>
              <input type="text" id="nombre" class="form-control" required name="nombre">
            </p>
          </div>
          <div class="">
            <p class="form-row form-row-wide">
              <label for="domicilio" class="text-muted">Domicilio</label>
              <input type="text" id="domicilio" class="form-control" required name="domicilio">
            </p>
          </div>

        </div>
        <div class="col-lg-12 mb-4" style="display:inline-flex; padding-left: 0px;">
            <div class="col-lg-6">
              <label for="nombreTarjeta" class="text-muted">Nombre y Apellido</label>
              <input type="text" id="nombreTarjeta" class="form-control" placeholder="Como figuran en la tarjeta"required>
            </div>
            <div class="col-lg-3">
              <label for="mesVencimiento" class="text-muted">Mes de Vencimiento</label>
              <input type="text" id="mesVencimiento" class="form-control" required>
            </div>
            <div class="col-lg-3">
              <label for="anioVencimiento" class="text-muted">Año de Vencimiento</label>
              <input type="text" id="anioVencimiento" class="form-control" required>
            </div>
        </div>

        <div class="col-lg-12  mb-4" style="display:inline-flex; padding-left: 0px;">
          <div class="col-lg-6">
            <div class="form-row form-row-wide">
              <label for="numeroTarjeta" class="text-muted">Número de la Tarjeta de Crédito</label>
              <input type="text" id="numeroTarjeta" class="form-control" required>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-row form-row-wide">
              <label for="codSeguridad" class="text-muted">CVC</label>
              <input type="text" id="codSeguridad" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">Comprar</button>
        </div>
      </form>
    </div>
  </div>
    </div>
  </div>

  </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection
