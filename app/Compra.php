<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    protected $table = "compra";
    protected $guarded = [];

    public function Usuarios(){
      return $this->belongsTo('App\User', 'usuario_id');
    }
  
}
