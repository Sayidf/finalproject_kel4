<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\OrderDetail;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $od = OrderDetail::all();
        return view('pembayaran.index', compact('od'));
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

        $id = auth()->user()->id;
        $data_reservasi = Reservasi::where('id_users', $id)->orderBy('id', 'desc')->first('id');
        // $data_reservasi = Reservasi::find($id);

        $menu = Menu::all()->first();

        $cart = session()->get('cart');
        $menu->harga = 'harga';
        $request->menu = 'id';
        // $cart[$request->id] = 'id';
        session()->put('cart', $cart);


        $total_price = 0;
        foreach ($cart as $c) {
            $total_price += $c['harga'] * $c['quantity'];
        }

        //Create Order
        $order = new Pembayaran();
        $order->tgl_pembayaran = now();
        $order->total_bayar = $total_price;
        $order->id_reservasi = $data_reservasi->id;
        $order->save();

        $data = Reservasi::find($data_reservasi->id);
        $data->status = 'done';
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
