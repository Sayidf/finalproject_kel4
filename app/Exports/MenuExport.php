<?php

namespace App\Exports;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MenuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        //return Menu::all();
        $ar_menu = DB::table('menu')
        ->join('kategori', 'kategori.id', '=', 'menu.id_kategori')
        ->select('kategori.nama AS kategori','menu.nama',
                 'menu.harga', 'menu.ket')
        ->get();
        return $ar_menu;
    }

    public function headings(): array
    {
        return ["Kategori", "Nama Menu", "Harga", "Ket"];
    }
}
