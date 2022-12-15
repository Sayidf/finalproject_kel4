<?php

namespace App\Exports;

use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservasiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $ar_reservasi = DB::table('reservasi')
        ->join('users', 'users.id', '=', 'reservasi.id_users')
        ->join('meja', 'meja.id', '=', 'reservasi.id_meja')
        ->select('users.fullname AS namaLengkap','reservasi.tgl_reservasi',
                 'reservasi.jam_in', 'reservasi.jam_out', 'reservasi.status',
                 'reservasi.jml_orang', 'meja.no_meja AS no_meja')
        ->get();
        return $ar_reservasi;
    }

    public function headings(): array
    {
        return ["Nama Lengkap", "Tanggal Reservasi", "Check In", "Check Out", "Status", "Jumlah Orang", "No Meja"];
    }
}
