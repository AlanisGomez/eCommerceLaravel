@extends('layouts.plantilla')

@section('titulo')
Mis compras
@endsection

@section('content')
<div class="px-4 px-lg-0">
    <div class="container pt-5 text-center">
        <h1 class="display-4">Categorías</h1>
    </div>
    <div class="pb-5 pt-5 mt-5 bodybkg">
        <div class="container">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                          <td><img src="../../{{ $categoria->imagen }}"alt="" width="150" class="img-fluid rounded shadow-sm" style="text-align: center"></td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->descripcion}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('styles')
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
@endpush
