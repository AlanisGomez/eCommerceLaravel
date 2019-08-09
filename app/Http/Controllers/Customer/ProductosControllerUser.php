<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Cart;
use App\Compra;
use App\CompraDetalle;

use Session;
use Auth;


class ProductosControllerUser extends Controller
{
  public function index()
  {
      $productos=Producto::paginate(12);

      return view('/indexProductos', [
        'productos' => $productos,
      ]);
  }

  public function search(Request $request) {
      $productos= Producto::where('nombre', 'like', '%' . $request->get('q') .'%')->get();

    return view("/indexProductos", [
          'productos' => $productos
        ]);
    }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function show($id)
  {   $productos=Producto::all();
      $producto= Producto::find($id);
      return view('customer/detalleProducto', [
        'producto' => $producto,
        'productos' => $productos,
      ]);
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
      $productos = $cart->items;

      try {
          $compra = new Compra();
          $compra->fec_compra = now();
          $compra->total = $cart->totalPrice + 100;
          $compra->num_factura = rand();
          $compra->medio_pago='TC';
          $compra->tipo_comprobante='FC';
          $compra->moneda = 'PES';
          $compra->usuario_id = Auth::user()->id;
          $compra->save();

          foreach ($productos as $producto) {
            $compraDet = new CompraDetalle();
            $compraDet->cantidad = $producto['qty'] ;
            $compraDet->talle = 'M';
            $compraDet->producto_id = $producto['item']['id'];
            $compraDet->compra_id = $compra->id;
            $compraDet->save();

          }

      } catch (\Exception $e) {
          return redirect()->route('checkout')->with('error', $e->getMessage());
      }

      Session::forget('cart');
      return view('shop.endShop');

  }
}
