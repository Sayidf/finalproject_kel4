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
        $kategori = Kategori::all();
        return new KategoriResource(true, 'Data Kategori',$kategori);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        return new KategoriResource(true, 'Data Kategori',$kategori);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|unique:kategori|max:45',
            'created_at' => now(),
        ], [
            'nama.required' => 'Nama Kategori Wajib di isi',
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
            'nama' => 'required|unique:kategori|max:45',
            'created_at' => now(),
        ], [
            'nama.required' => 'Nama Kategori Wajib di isi',
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $kategori = Kategori::whereId($id)->update(
        [
            'nama'=>$request->nama,
            'created_at'=>now(),
        ]);

        return new KategoriResource(true, 'Data kategori berhasil di ubah',$kategori);

    }

    public function destroy($id)
    {
        $kategori = Kategori::whereId($id)->first();
        $kategori->delete();
        return new KategoriResource(true, 'Data kategori berhasil di hapus',$kategori);
    }


}
