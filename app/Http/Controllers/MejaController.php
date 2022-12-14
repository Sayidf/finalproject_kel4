<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        $meja = Meja::orderBy('no_meja', 'ASC')->get();
        return view('meja.index', compact('meja'));
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
            'no_meja' => 'required|unique:meja|max:45',
            'kapasitas' => 'required|max:45'
        ]);

        DB::table('meja')->insert(
            [
                'no_meja'=>$request->no_meja,
                'kapasitas'=>$request->kapasitas,
                'created_at'=>now(),
            ]);

        return redirect()->route('meja.index')
            ->with('success', 'Meja Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Meja::find($id);
        return view('meja.index', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Meja::find($id);
        return view('meja.edit', compact('row'));
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
            'no_meja' => 'required|unique:meja|max:45',
            'kapasitas' => 'required|max:45'
        ]);

        DB::table('meja')->where('id',$id)->update(
            [
                'no_meja'=>$request->no_meja,
                'kapasitas'=>$request->kapasitas,
                'updated_at'=>now(),
            ]);

        return redirect('/administrator/meja')
            ->with('success', 'Data Meja Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Meja::find($id);
        Meja::where('id',$id)->delete();
        return redirect()->route('meja.index')
                        ->with('success','Data Meja Berhasil Dihapus');
    }


    public function mejaPDF()
    {
        $meja = Meja::all();
        $pdf = PDF::loadView('meja.mejaPDF', ['meja'=>$meja]);
        return $pdf->download('data_meja.pdf');
    }

    public function mejaExcel() 
    {
        return Excel::download(new MejaExport, 'data_meja.xlsx');
    }

    public function apiMeja()
    {
        $meja = Meja::all();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Meja',
                'data'=>$meja,
            ],200);
    }

    public function apiMejaDetail($id)
    {
       
        $meja = Meja::find($id);
        if($meja){ //jika data meja ditemukan
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Meja',
                    'data'=>$meja,
                ],200);
        }
        else{ //jika data meja tidak ditemukan
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Meja Tidak ditemukan',
                ],404);
        }
    }
}
