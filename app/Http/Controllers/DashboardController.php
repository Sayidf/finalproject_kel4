<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Reservasi;
use App\Models\Order;
use DB;
use Alert;

class DashboardController extends Controller
{
    public function index(){
        $ar_menu = DB::table('menu')->select('nama', 'harga')->get();
        $ar_kategori = DB::table('menu')
                    ->selectRaw('menu.id_kategori, count(menu.id_kategori) as jumlah, kategori.nama')
                    ->join('kategori', 'kategori.id', '=', 'menu.id_kategori')
                    ->groupBy('menu.id_kategori', 'kategori.nama')
                    ->get();
        $ar_customer = DB::table('users')->selectRaw('count(role) as jumlah')->where('role', 'user')->groupBy('role')->get();
        $ar_reservasi = DB::table('reservasi')->selectRaw('count(status) as jumlah')->where('status', 'pending')->groupBy('status')->get();
        $ar_reservasi_done = DB::table('reservasi')->selectRaw('count(status) as jumlah')->where('status', 'done')->groupBy('status')->get();
        $ar_penghasilan = DB::table('pembayaran')->selectRaw('sum(total_bayar) as jumlah')->get();
        $ar_maxorder = DB::table('orderdetails')
                    ->selectRaw('menu.nama, menu.foto, sum(orderdetails.quantityOrder) as jumlah, orderdetails.menu_id')
                    ->join('menu', 'menu.id', '=', 'orderdetails.menu_id')
                    ->groupBy('orderdetails.menu_id', 'menu.nama', 'menu.foto')
                    ->OrderBy('jumlah', 'DESC')
                    ->limit(3)
                    ->get();
        // $ar_customer = DB::table('users')->count('role')->where('role', 'user')->groupBy('role')->get();
        return view('back.home', compact('ar_menu', 'ar_kategori', 'ar_customer', 'ar_reservasi', 'ar_reservasi_done', 'ar_penghasilan', 'ar_maxorder'));
    }
}
