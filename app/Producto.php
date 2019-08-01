<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $guarded = [];

    public function categorias(){
      return $this->belongsTo('App\Categoria', 'CategoriaId');

    public function marcas(){
      return $this->belongsTo('App\Marca', 'MarcaId');
    }

    public function compras(){
      return $this->belongsToMany('App\Compra', 'CompraDetalle','ProductoId', 'CompraId');
    }
}
