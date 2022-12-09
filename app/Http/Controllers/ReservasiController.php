<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Reservasi;
use App\Models\Users;
use Illuminate\Http\Request;
use DB;
use PDF;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservasiExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservasi = Reservasi::orderBy('id', 'DESC')->get();
        return view('reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr_meja = Meja::all();
        $users = Users::all();
        return view('reservasi.create', compact('arr_meja', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        Session::flash('id', $request->id);
        $request->validate([
            'tgl_reservasi' => 'required',
            'jam_in' => 'required|date_format:H:i',
            'jam_out' => 'required|date_format:H:i',
            'id_meja' => 'required|integer',
            'id_users' => 'integer',
            'jml_orang' => 'required|integer',
            'created_at' => now(),
        ], [
            'tgl_reservasi.required' => 'Tanggal Wajib di isi',
            'jam_in.required' => 'Waktu Check In Wajib di isi',
            'jam_out.required' => 'Waktu Check Out Wajib di isi',
            'id_meja.required' => 'Silahkan Pilih Nomor Meja',
            'jml_orang.required' => 'Silahkan masukan Jumlah Orang',

        ]);

        Reservasi::create($request->all());

        return redirect('/data-reservasi' . '/' . $id)
            ->with('success', 'Berhasil Reservasi');
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

    public function reservasiPDF()
    {
        $reservasi = Reservasi::all();
        $pdf = PDF::loadView('reservasi.reservasiPDF', ['reservasi' => $reservasi]);
        return $pdf->download('data_reservasi.pdf');
    }

    public function reservasiExcel()
    {
        return Excel::download(new ReservasiExport, 'data_reservasi.xlsx');
    }

    public function dataReservasi($id)
    {
        $data_reservasi = Reservasi::where('id_users', $id)->get();
        return view('reservasi.data', compact('data_reservasi'));
    }

    public function cekReservasi($id)
    {
        $ar_reservasi = Reservasi::where('id_users', $id)->orderBy('id', 'desc')->first();
        return view('cart.cart', compact('ar_reservasi'));
    }

    public function canceled($id)
    {
        $data = Reservasi::find($id);
        $data->status = 'cancel';
        $data->save();
        return redirect()->back();
    }
    public function approved($id)
    {
        $data = Reservasi::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function done($id)
    {
        $data = Reservasi::find($id);
        $data->status = 'done';
        $data->save();
        return redirect()->back();
    }


    //Resrevasi API
    public function apiReservasi()
    {
        
        $reservasi = Reservasi::join('users', 'users.id', '=', 'reservasi.id_users')
                ->select('users.fullname AS nama','reservasi.tgl_reservasi', 'reservasi.jam_in', 
                'reservasi.jam_out', 'reservasi.status', 'reservasi.id_meja', 'reservasi.id_users', 
                'reservasi.jml_orang',)
                ->get();
        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Reservasi',
                'data'=>$reservasi,
            ],200);
    }

    public function apiReservasiDetail($id)
    {
      
        $reservasi = Reservasi::join('users', 'users.id', '=', 'reservasi.id_users')
        ->select('users.fullname AS nama','reservasi.tgl_reservasi', 'reservasi.jam_in', 'reservasi.jam_out', 'reservasi.status', 
        'reservasi.id_meja', 'reservasi.id_users', 'reservasi.jml_orang',)
        ->where('reservasi.id', '=', $id) 
        ->get();
        
        if($reservasi){ 
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Detail Reservasi',
                    'data'=>$reservasi,
                ],200);
        }
        else{
            return response()->json(
                [
                    'success'=>false,
                    'message'=>'Detail Reservasi Tidak ditemukan',
                ],404);
        }
    }
}
