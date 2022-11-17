<?php

namespace App\Exports;

use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KategoriExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_kategori = DB::table('menu')->select('nama','nama')->get();
      return $ar_kategori;
    }

    public function headings(): array
    {
        return ["Nama Kategori"];
    }
}
