@extends('layouts.plantilla')

@section('titulo')
Finalizar Compra
@endsection

@section('content')
<body class="bodybkg">
<div class="px-4 px-lg-0 pb-5">
        <div class="container pt-5">
            <div class="row py-3 bg-white rounded shadow-sm justify-content-center">
              <div class="container pt-3 text-center">
                  <h1 class="display-4">¡Tu compra fue Finalizada!</h1>
              </div>
              <div class="container pt-3 text-center">
                <h1><i class="fas fa-smile-wink fa-7x" aria-hidden="true"></i></h1>
              </div>
              <div class="container pt-3 pb-3 text-center">
                <p class="lead mb-0">¡Muchas gracias por confiar en nosotros!<a href="{{ route('home') }}"> Seguir comprando</a></p>
              </div>
            </div>
        </div>
</div>
<body>

@endsection
