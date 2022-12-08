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
        return new ReservasisResource(true, 'Data Pegawai',$reservasi);
    }
}
