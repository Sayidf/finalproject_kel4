<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Reservasi;
use DB;

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
        // $ar_customer = DB::table('users')->count('role')->where('role', 'user')->groupBy('role')->get();
        return view('back.home', compact('ar_menu', 'ar_kategori', 'ar_customer', 'ar_reservasi'));
    }
}
