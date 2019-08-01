<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $guarded = [];

    public function Usuarios(){
      return $this->belongsTo('App\User', 'UsuarioId')
    }

    public function productos(){
      return $this->belongsToMany('App\Producto', 'CompraDetalle','CompraId','ProductoId',);
    }
}
