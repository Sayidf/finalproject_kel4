<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $menu = Menu::all();
        $kategori = Kategori::all();
        return view('menu.index', compact('menu', 'kategori'));
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
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama' => 'required|unique:menu|max:45',
            'harga' => 'required|max:10',
            'ket' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        if(!empty($request->foto)){
            $fileName = $request->nama.' '.$request->id_kategori.'.'.$request->foto->extension();
            // $fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/images/menu'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('menu')->insert(
            [
                'id_kategori'=>$request->id_kategori,
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'ket'=>$request->ket,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);

        return redirect()->route('menu.index')
            ->with('success', 'Menu Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Menu::find($id);
        return view('menu.detail',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Menu::find($id);
        return view('menu.form_edit', compact('row'));
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
        $request->validate([
            'id_kategori' => 'required|integer',
            'nama' => 'required|max:45',
            'harga' => 'required|max:10',
            'ket' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        //------------foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('menu')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user ingin ganti foto lama-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($row->foto)) unlink('/public/admin/images/menu/'.$row->foto);
            //foto lama ganti foto baru
            $fileName = $request->nama.' '.$request->id_kategori.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('/public/admin/images/menu'),$fileName);
        }
        //------------user tidak berniat ganti foto lama-----------
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan insert data dari request form
        DB::table('menu')->where('id',$id)->update(
            [
                'id_kategori'=>$request->id_kategori,
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'ket'=>$request->ket,
                'foto'=>$fileName,
                'updated_at'=>now(),
            ]);

        return redirect('/administrator/menu')
            ->with('success', 'Data Menu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Menu::find($id);
        Menu::where('id',$id)->delete();
        if(!empty($row->foto)) unlink('public/admin/images/menu/'.$row->foto);
        //setelah itu baru hapus data menu
        return redirect()->route('menu.index')
                        ->with('success','Data Menu Berhasil Dihapus');
    }
}
