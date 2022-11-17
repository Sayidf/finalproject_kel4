<?php

namespace App\Exports;

use App\Models\Meja;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MejaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_meja = DB::table('meja')->select('no_meja','kapasitas')->get();
      return $ar_meja;
    }

    public function headings(): array
    {
        return ["No Meja", "Kapasitas"];
    }
}
