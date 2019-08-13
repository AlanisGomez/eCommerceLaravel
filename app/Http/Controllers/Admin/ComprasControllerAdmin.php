<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compra;
use App\CompraDetalle;
use App\Producto;
use Auth;

class ComprasControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $compras=Compra::all();    //::where('usuario_id', '=',$id)->get();

      return view('admin\indexVentas', [
        'compras' => $compras,
      ]);
    }

    public function indexByUser()
    {
      $id = Auth::user()->id;
      $compras=Compra::where('usuario_id', '=',$id)->get();

      return view('admin\indexVentas', [
        'compras' => $compras,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $compra = Compra::find($id);
      $detalles= CompraDetalle::where('compra_id','=',$id)->get();
      return view('customer\compraDetalle', [
        'detalles' => $detalles,
        'fec_compra' =>$compra->fec_compra,
        'total' =>$compra->total
      ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
