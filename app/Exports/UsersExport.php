<?php

namespace App\Exports;

use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_user = DB::table('users')->select('fullname','username', 'email', 'no_hp', 'created_at')->get();
      return $ar_user;
    }

    public function headings(): array
    {
        return ["Nama Lengkap", "Username", "Email", "Nomor Telepon", "Tanggal Register"];
    }
}
