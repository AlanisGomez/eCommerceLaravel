@extends('layouts.plantilla')

@section('titulo')
Mis compras
@endsection

@section('content')
<div class="px-4 px-lg-0">
    <div class="container pt-5 text-center">
        <h1 class="display-4">Usuarios</h1>
    </div>
    <div class="pb-5 pt-5 mt-5 bodybkg">
        <div class="container">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Mail</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->apellido}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->role}}</td>
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
