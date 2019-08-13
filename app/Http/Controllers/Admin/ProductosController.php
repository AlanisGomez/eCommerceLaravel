<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Categoria;
use App\Marca;
use App\Producto;
use App\Cart;
use Session;
use Auth;


class ProductosController extends Controller
{
  public function index()
  {
      $productos=Producto::paginate(12);

      return view('admin/indexProductos', [
        'productos' => $productos,
      ]);
  }

  public function search(Request $request) {
      $productos= Producto::where('nombre', 'like', '%' . $request->get('q') .'%')->get();

    return view("admin/productos", [
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
   return view('admin/createProducto');
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
          "imagen" => "file"
        ],
        [
          "string"=> "El campo :attribute debe ser un texto",
          "numeric"=> "El campo :attribute debe ser un número",
          "min"=> "El campo :attribute tiene un minimo de :min",
          "file" => "Debe subir un archivo"
        ]);

    $productoNuevo = new Producto();

    $ruta = $request->file('imagen')->store("public");
    $nombreArchivo = '/storage/' . basename($ruta);

    $productoNuevo->imagen = $nombreArchivo;
    $productoNuevo->nombre = $request["nombre"];
    $productoNuevo->descripcion = $request["descripcion"];
    $productoNuevo->precio = $request["precio"];
    $productoNuevo->stock = $request["stock"];
    $productoNuevo->marca_id = Marca::all()->random()->id;
    $productoNuevo->categoria_id = Categoria::all()->random()->id;

    $productoNuevo->save();
    return redirect("admin/productos");
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
      return view('admin/detalleProducto', [
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
      $producto= Producto::find($id);
      return view('admin/updateProducto', [
        'producto' => $producto,
        'id'=> $id,
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

    if($request->filled('imagen')){
      $ruta = $request->imagen->store("public");
      $nombreArchivo = basename($ruta);
      $productoUpdate->imagen = $nombreArchivo;
    }

    $productoUpdate->nombre = $request["nombre"];
    $productoUpdate->descripcion = $request["descripcion"];
    $productoUpdate->precio = $request["precio"];
    $productoUpdate->stock = $request["stock"];
    //$productoUpdate->marca_id = $request["marca_id"];
    //$productoUpdate->categoria_id = $request["categoria_id"];

    $productoUpdate->save();
    return redirect("admin/productos");
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
    return redirect('admin/productos');
  }

  public function welcomeAdmin(){
    return redirect('welcome');
  }


  public function getAddToCart(Request $request, $id)
  {
      $producto= Producto::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($producto, $producto->id);

      $request->session()->put('cart', $cart);
      return redirect()->route('product.index');
  }

  public function getReduceByOne($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }
      return redirect()->route('product.shoppingCart');
  }

  public function getRemoveItem($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }

      return redirect()->route('product.shoppingCart');
  }

  public function getCart()
  {
      if (!Session::has('cart')) {
          return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('shop.shopping-cart', ['productos' => $cart->items, 'totalPrice' => $cart->totalPrice]);
  }

  public function getCheckout()
  {
      if (!Session::has('cart')) {
          return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('shop.checkout', ['total' => $total]);
  }

  public function postCheckout(Request $request)
  {
      if (!Session::has('cart')) {
          return redirect()->route('shop.shoppingCart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      Stripe::setApiKey('sk_test_fwmVPdJfpkmwlQRedXec5IxR');
      try {
          $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "PES",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "description" => "Test Charge"
          ));
          $order = new Order();
          $order->cart = serialize($cart);
          $order->address = $request->input('address');
          $order->name = $request->input('name');
          $order->payment_id = $charge->id;

          Auth::user()->orders()->save($order);
      } catch (\Exception $e) {
          return redirect()->route('checkout')->with('error', $e->getMessage());
      }

      Session::forget('cart');
      return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
  }
}
