@extends('layouts.plantilla')

@section('titulo')
Finalizar Compra
@endsection

@section('content')
<!-- CABECERA -->
<div class="container pt-5 text-center">
    <h3 class="display-4">Detalle de Compra</h3>
</div>
<!-- FIN -->

<div class="pb-5 pt-5 mt-5 bodybkg">
    <div class="container bg-white rounded shadow-sm py-5 p-4 justify-content-center">
      <div class="row justify-content-center">
        <h5 style="padding-right:100px;">Fecha: {{ $fec_compra }}</h5>
        <h5>Total: {{ $total }}</h5>
      </div>
        <div class="row py-3 p-4 justify-content-center">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th></th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Cantidad</th>
                      <th>Precio por Unidad</th>
                  </tr>
              </thead>
              <tbody>
          @foreach($detalles as $detalle)
            <div class="" style="display:none">
              {{$producto = App\Producto::find($detalle->producto_id)}}
            </div>
            <tr>
              <td>
                <img src="{{ $producto->imagen }}"alt="" width="70" class="img-fluid rounded shadow-sm">
              </td>
              <td>
                <h5 class="mb-0">{{$producto->nombre}}</h5>
              </td>
              <td>
                <span class="text-muted font-weight-normal font-italic d-block">{{ $producto->descripcion}}</span>
              </td>
              <td class="" style="text-align:center">
                <strong>{{ $detalle->cantidad}}</strong>
              </td>
              <td class="" style="text-align:center">
                <strong>${{ $producto->precio}}</strong>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>

@endsection
