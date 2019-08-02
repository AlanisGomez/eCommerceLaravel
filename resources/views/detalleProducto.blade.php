@extends('layouts.plantilla')

@section('content')
  <body>
  <div class="container">
  <section class="colecciones">
    <div class="row">
      <h3>{{/*$producto->nombre*/}}</h3>
       <div class="img-container">
         <img src="/storage/{{/*$producto->foto*/}}" alt="">
       </div>
       <p>{{/*$producto->ProductoDesc*/}}</p>
       <form class="" action="/borrarActor" method="post">
         {{csrf_field()}}
         <input type="hidden" name="id" value="{{$actor->id }}">
         <input type="submit" name="" value="Borrar Actor">
       </form>
    </div>
    </section>
  </div>
</body>
{{$productos->link()}}
@endsection
