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

        return view('indexProductos', [
          'productos' => $productos,
        ]);
    }

    public function search(Request $request) {
        $productos= Producto::where('nombre', 'like', '%' . $request->get('q') .'%')->get();

      return view("indexProductos", [
            'productos' => $productos
          ]);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('/createProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            "nombre"=> "string|min:3",
            "descripcion"=> "string",
            "precio"=> "numeric|min:0|",
            "foto" => "file"
          ],
          [
            "string"=> "El campo :attribute debe ser un texto",
            "numeric"=> "El campo :attribute debe ser un número",
            "min"=> "El campo :attribute tiene un minimo de :min",
            "file" => "Debe subir un archivo"
          ]);

      $productoNuevo = new Producto();

      $ruta = $request->file("foto")->store("public");
      $nombreArchivo = basename($ruta);

      $productoNuevo->foto = $nombreArchivo;
      $productoNuevo->nombre = $request["nombre"];
      $productoNuevo->descripcion = $request["descripcion"];
      $productoNuevo->precio = $request["precio"];
      $productoNuevo->stock = $request["stock"];
      $productoNuevo->marca_id = $request["marca_id"];
      $productoNuevo->categoria_id = $request["categoria_id"];

      $productoNuevo->save();
      return redirect("/productos");
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
        return view('detalleProductoAdmin', [
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
        $productoUpdate =Producto::find($id);
        return view('/updateProducto', [
          'id' => $id,
        ]);
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

      $this->validate($request, [
            "nombre"=> "string|min:3",
            "descripcion"=> "string",
            "precio"=> "numeric|min:0|",
            "foto" => "file"
          ],
          [
            "string"=> "El campo :attribute debe ser un texto",
            "numeric"=> "El campo :attribute debe ser un número",
            "min"=> "El campo :attribute tiene un minimo de :min",
            "file" => "Debe subir un archivo"
          ]);

      $productoUpdate =Producto::find($id);

      $ruta = $request->file("foto")->store("public");
      $nombreArchivo = basename($ruta);

      $productoUpdate->foto = $nombreArchivo;

      $productoUpdate->nombre = $request["nombre"];
      $productoUpdate->descripcion = $request["descripcion"];
      $productoUpdate->precio = $request["precio"];
      $productoUpdate->stock = $request["stock"];
      $productoUpdate->marca_id = $request["marca_id"];
      $productoUpdate->marca_id = $request["marca_id"];
      $productoUpdate->categoria_id = $request["categoria_id"];

      $productoUpdate->save();
      return redirect("/productos");
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
      return redirect('/productos');
    }
}
