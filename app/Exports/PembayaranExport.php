<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_pembayaran = DB::table('pembayaran')
      ->select('id_reservasi', 'tgl_pembayaran', 'total_bayar')
      ->get();
      return $ar_pembayaran;
    }

    public function headings(): array
    {
        return ["Kode Booking", "Tanggal Pembayaran", "Total Pembayaran"];
    }
}
