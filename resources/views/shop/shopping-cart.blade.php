@extends('layouts.plantilla')

@section('titulo')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="contentCart">
          <div class="row justifyCenter">
              <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                  <ul class="list-group">
                      @foreach($productos as $producto)
                              <li class="list-group-item">
                                <div class="col-3">
                                  <span class="badge">{{ $producto['qty'] }}</span>
                                  <strong>{{ $producto['item']['nombre'] }}</strong>
                                </div>
                                <div class="col-3">
                                  <span class="label label-success">${{ $producto['item']['precio'] }}</span>
                                </div>
                                <div class="btn-group col-3">
                                    <a class="btn btn-primary btn-xs" href="{{ route('product.reduceByOne', ['id' => $producto['item']['id']]) }}">Quitar del carrito</a>                                      
                                  </div>
                              </li>
                      @endforeach
                  </ul>
              </div>
          </div>
          <div class="row justifyCenter">
              <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                  <strong>Total: {{ $totalPrice }}</strong>
              </div>
          </div>
          <hr>
          <div class="row justifyCenter">
              <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                  <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Comprar</a>
              </div>
          </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection
