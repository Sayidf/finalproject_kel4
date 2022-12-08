<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use App\Models\Kategori;
use App\Models\Menu;
use DB;

class MenuController extends Controller
{
    public function index()
    {
        
        $menu = Menu::join('kategori', 'kategori.id', '=', 'menu.id_kategori')
                ->select('menu.nama','kategori.nama AS kategori', 'menu.harga')
                ->get();
        return new MenuResource(true, 'Data Menu',$menu);
    }

    public function show($id)
    {
       
        $menu = Menu::join('kategori', 'kategori.id', '=', 'menu.id_kategori')
        ->select('menu.nama','kategori.nama AS kategori', 'menu.harga')
        ->where('menu.id', '=', $id) 
        ->get();
        return new MenuResource(true, 'Data Menu',$menu);
    }


    public function store(Request $request)
    {

        $validator = Validate::make($request->all(),[
            'id_kategori' => 'required|integer',
            'nama' => 'required|unique:menu|max:45',
            'harga' => 'required|max:10',
            'ket' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

       $reservasi = Reservasi::create(
            [
                'id_kategori'=>$request->id_kategori,
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'ket'=>$request->ket,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);

        return new MenuResource(true, 'Data menu',$menu);
    }
}
