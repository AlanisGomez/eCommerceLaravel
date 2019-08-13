<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
  public function indexAdmin(){
    return view('admin\dashboard');
  }
}
