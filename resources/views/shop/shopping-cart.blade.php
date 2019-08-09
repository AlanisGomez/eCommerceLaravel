@extends('layouts.plantilla')

@section('titulo')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
    <div class="px-4 px-lg-0">
      <!-- CABECERA -->
      <div class="container pt-5 text-center">
        <h1 class="display-4">Mi carrito de compras</h1>
        <p class="lead mb-0">¡No te quedes con las ganas!</p>
      </div>
      <!-- FIN -->

      <div class="pb-5 pt-5 mt-5 bodybkg">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

              <!-- Shopping cart table -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">Producto</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Precio</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Cantidad</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Eliminar</div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($productos as $producto)
                      <th scope="row" class="border-0">
                        <div class="p-2">
                          <img src="{{ $producto['item']['imagen'] }}"alt="" width="70" class="img-fluid rounded shadow-sm">
                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{$producto['item']['nombre'] }}</a></h5>
                            <span class="text-muted font-weight-normal font-italic d-block">{{ $producto['item']['descripcion'] }}</span>
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong>${{ $producto['item']['precio'] }}</strong></td>
                      <td class="border-0 align-middle"><strong>{{ $producto['qty'] }}</strong></td>
                      <td class="border-0 align-middle"><a href="{{ route('product.reduceByOne', ['id' => $producto['item']['id']]) }}" class="text-dark"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- End -->
            </div>
          </div>

          <div class="row py-5 p-4 bg-white rounded shadow-sm">
            <div class="col-lg-6">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Código de descuento</div>
              <div class="p-4">
                <p class="font-italic mb-4">Si tenés un código de descuento por favor ingresalo acá.</p>
                <div class="input-group mb-4 border rounded-pill p-2">
                  <input type="text" placeholder="Código cupón" aria-describedby="button-addon3" class="form-control border-0">
                  <div class="input-group-append border-0">
                    <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Aplicar cupón</button>
                  </div>
                </div>
              </div>
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Comentarios</div>
              <div class="p-4">
                <p class="font-italic mb-4">Si tienes algún comentario escribilo acá abajo.</p>
                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen de compra </div>
              <div class="p-4">
                <p class="font-italic mb-4">Los gastos y tiempos de envío pueden variar por distancia y disponibilidad.</p>
                <ul class="list-unstyled mb-4">
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal </strong><strong>{{ $totalPrice }}</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Envío</strong><strong>$100.00</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Impuestos</strong><strong>$0.00</strong></li>
                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                    <h5 class="font-weight-bold">{{ $totalPrice +100}}</h5>
                  </li>
                </ul><a href="{{ route('checkout') }}" class="btn btn-dark rounded-pill py-2 btn-block">Comprar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @else
      <div class="px-4 px-lg-0">
        <!-- CABECERA -->
        <div class="container pt-5 text-center">
          <h1 class="display-4">Tu carrito está vacío</h1>
          <p class="lead mb-0">¡Todos nuestros productos te esperan!</p>
        </div>
        </div>
    @endif
@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endpush

@push('styles')
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
