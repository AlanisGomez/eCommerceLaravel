<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Producto;
use App\User;
use Session;
use Auth;


class HomeControllerAdmin extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function index()
  {
    $productos=Producto::all();
      return view('admin/dashboard', [
        'productos'=>$productos,
      ]);

  }
}
