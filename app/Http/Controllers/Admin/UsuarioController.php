<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuarioController extends Controller
{

  public function index()
  {
    $usuarios=User::all();

    return view('admin/indexUsuarios', [
      'usuarios' => $usuarios,
    ]);
  }


}
