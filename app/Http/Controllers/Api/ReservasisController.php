<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Users;
use App\Http\Resources\ReservasisResource;
use DB;
use Illuminate\Support\Facades\Validator;

class ReservasisController extends Controller
{
    public function index()
    {
        
        $reservasi = Reservasi::join('users', 'users.id', '=', 'reservasi.id_users')
                ->select('users.fullname AS nama','reservasi.tgl_reservasi', 'reservasi.jam_in', 
                'reservasi.jam_out', 'reservasi.status', 'reservasi.id_meja', 'reservasi.id_users', 
                'reservasi.jml_orang',)
                ->get();
        return new ReservasisResource(true, 'Data reservasi',$reservasi);
    }

    public function show($id)
    {
        $reservasi = Reservasi::join('users', 'users.id', '=', 'reservasi.id_users')
        ->select('users.fullname AS nama','reservasi.tgl_reservasi', 'reservasi.jam_in', 'reservasi.jam_out', 'reservasi.status', 
        'reservasi.id_meja', 'reservasi.id_users', 'reservasi.jml_orang',)
        ->where('reservasi.id', '=', $id) 
        ->get();

        return new ReservasisResource(true, 'Data reservasi',$reservasi);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $reservasi = Reservasi::create([

            'tgl_reservasi' => $request->tgl_reservasi,
            'jam_in' => $request->jam_in,
            'jam_out' => $request->jam_out,
            'id_meja' => $request->id_meja,
            'id_users' => $request->id_users,
            'jml_orang' => $request->jml_orang,
            'created_at' => now(),

        ]);

        return new ReservasisResource(true, 'Data reservasi berhasil di input',$reservasi);
    }
}
