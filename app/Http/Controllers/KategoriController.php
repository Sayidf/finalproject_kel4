<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
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
            'nama' => 'required|unique:kategori|max:45',
        ]);

        DB::table('kategori')->insert(
            [
                'nama'=>$request->nama,
                'created_at'=>now(),
            ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori Berhasil Disimpan');
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
        $row = Kategori::find($id);
        return view('kategori.edit', compact('row'));
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
            'nama' => 'required|unique:kategori|max:45',
        ]);

        DB::table('kategori')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
                'updated_at'=>now(),
            ]);

        return redirect('/administrator/kategori')
            ->with('success', 'Data Kategori Menu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Kategori::find($id);
        Kategori::where('id',$id)->delete();
        return redirect()->route('kategori.index')
                        ->with('success','Data Kategori Berhasil Dihapus');
    }

    public function kategoriPDF()
    {
        $kategori = Kategori::all();
        $pdf = PDF::loadView('kategori.kategoriPDF', ['kategori'=>$kategori]);
        return $pdf->download('data_kategori.pdf');
    }

    public function kategoriExcel() 
    {
        return Excel::download(new KategoriExport, 'data_kategori.xlsx');
    }
}
