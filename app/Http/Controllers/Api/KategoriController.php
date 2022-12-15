<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Users;
use App\Http\Resources\KategoriResource;
use DB;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        
        $Kategori = Kategori::all();
        return new KategoriResource(true, 'Data Kategori',$Kategori);
    }

    public function show($id)
    {
        $Kategori = Kategori::find($id);
        return new KategoriResource(true, 'Data Kategori',$Kategori);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori|max:45',
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $Kategori = Kategori::create([

            'nama'=>$request->nama,
            'created_at'=>now(),

        ]);

        return new KategoriResource(true, 'Data Kategori berhasil di input',$Kategori);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|unique:kategori|max:45'
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $Kategori = Kategori::whereId($id)->update([

            'nama'=>$request->nama,
            'created_at'=>now(),

        ]);

        return new KategoriResource(true, 'Data Kategori berhasil di ubah',$Kategori);

    }


}
