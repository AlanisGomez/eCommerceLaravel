<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    protected $table = "compra";
    protected $guarded = [];

    public function Usuarios(){
      return $this->belongsTo('App\User', 'usuario_id')
    }

    public function productos(){
      return $this->belongsToMany('App\Producto', 'compradetalle','compra_id','producto_id',);
    }
}
