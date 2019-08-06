<?php

namespace App\Http\Controllers;

use App\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();

        return view('home', [
          'productos' => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $productoNuevo = new Actor();
      $ruta = $request->file("foto")->store("public");
      $nombreArchivo = basename($ruta);

        $productoNuevo->foto = $nombreArchivo;
        $productoNuevo =Producto::find($id),
        $productoNuevo->nombre = $request["nombre"];
        $productoNuevo->descripcion = $request["descripcion"];
        $productoNuevo->precio = $request["precio"];
        $productoNuevo->stock = $request["stock"];
        $productoNuevo->marca_id = $request["marca_id"];
        $productoNuevo->marca_id = $request["marca_id"];
        $productoNuevo->categoria_id = $request["categoria_id"];

        $productoNuevo->save();
      return redirect("/indexProductos");
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
        $producto= Producto::find($id);
        return view('detalleProducto', [
          'producto' => $producto,
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

      $ruta = $request->file("foto")->store("public");
      $nombreArchivo = basename($ruta);

      $productoUpdate->foto = $nombreArchivo;
      $productoUpdate =Producto::find($id),
      $productoUpdate->nombre = $request["nombre"];
      $productoUpdate->descripcion = $request["descripcion"];
      $productoUpdate->precio = $request["precio"];
      $productoUpdate->stock = $request["stock"];
      $productoUpdate->marca_id = $request["marca_id"];
      $productoUpdate->marca_id = $request["marca_id"];
      $productoUpdate->categoria_id = $request["categoria_id"];

      $productoUpdate->save();
      return redirect("/detalleProducto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $id= $request['id'];
      $producto= Producto::find($id);
      $producto->delete();
      return redirect('/indexProductos');
    }
}
