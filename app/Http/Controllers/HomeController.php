<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\User;
use Session;
use Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
 public function __construct()
 {
     $this->middleware('auth');

 }

 /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
 public function index()
 {
   $productos=Producto::all();
     return view('customer/home', [
       'productos'=>$productos,
     ]);

 }
}
