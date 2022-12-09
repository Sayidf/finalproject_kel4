<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function index()
  {
    $menu = Menu::all();
    return view('cart.menu', compact('menu'));
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function cart()
  {
    return view('cart.cart');
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function addToCart($id)
  {
    $menu = Menu::findOrFail($id);

    $cart = session()->get('cart', []);


    if (isset($cart[$id])) {
      $cart[$id]['quantity']++;
    } else {
      $cart[$id] = [
        "id" => $menu->id,
        "nama" => $menu->nama,
        "quantity" => 1,
        "harga" => $menu->harga,
        "foto" => $menu->foto,
      ];
    }

    session()->put('cart', $cart);
    toast('Menu Berhasil Ditambah ke Keranjang!', 'success')->position('bottom-end')->width('fit-content');
    return redirect()->back();
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function update(Request $request)
  {
    if ($request->id && $request->quantity) {
      $cart = session()->get('cart');
      $cart[$request->id]["quantity"] = $request->quantity;
      session()->put('cart', $cart);
      toast('Keranjang Berhasil Diupdate!', 'success')->position('bottom-end')->width('fit-content');
    }
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function remove(Request $request)
  {
    if ($request->id) {
      $cart = session()->get('cart');
      if (isset($cart[$request->id])) {
        unset($cart[$request->id]);
        session()->put('cart', $cart);
      }
      toast('Menu Berhasil Dihapus!', 'success')->position('bottom-end')->width('fit-content');
    }
  }

  //Prosess Checkout
  public function checkout(Request $request)
  {

    //session cart
    $menu = Menu::all()->first();

    $cart = session()->get('cart');
    $menu->harga = 'harga';
    $request->quantity = 'quantity';
    $request->menu = 'id';
    // $cart[$request->id] = 'id';
    session()->put('cart', $cart);

    //session reservasi

    // $res = $request->id_reservasi;
    // $reservasi = Reservasi::all();
    // $res = session()->get('res', []);
    // $reservasi->id = 'id';
    // session()->put('res', $res);

    // $m = Menu::where('id', $request->menu->id)->get();

    if (count($cart) == 0) {
      return redirect()->back()->with('danger', 'Cart is empty');
    }
    $total_price = 0;
    foreach ($cart as $c) {
      $total_price += $c['harga'] * $c['quantity'];
    }

    //Create Order
    $order = new Order();
    $order->total = $total_price;
    $order->id_reservasi = Auth::id();
    $order->save();

    //Create Order Detail

    // $cartitem = cart::where('id', Auth::id())->get();

    foreach ($cart as $c) {
      $order_detail = new OrderDetail();
      $order_detail->orders_id = $order->id;
      $order_detail->menu_id = $c['id'];
      $order_detail->quantityOrder = $c['quantity'];
      $order_detail->save();
    }

    return redirect()->back();
    toast('Success Checkout', 'success')->position('bottom-end')->width('fit-content');
  }
}
