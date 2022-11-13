<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kategori';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama'];
    //relasi one to many ke tabel pegawai
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
