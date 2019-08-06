<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";
    protected $guarded = [];

    public function categorias(){
      return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function marcas(){
      return $this->belongsTo('App\Marca', 'marca_id');
    }

    public function compras(){
      return $this->belongsToMany('App\Compra', 'compradetalle','producto_id', 'compra_id');
    }
}
