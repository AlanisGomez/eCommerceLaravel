<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
  protected $table = "compradetalle";
  protected $guarded = [];

  public function Compra(){
    return $this->belongsTo('App\Compra', 'compra_id');
  }

  public function Producto(){
    return $this->belongsTo('App\Producto', 'producto_id');
  }
}
