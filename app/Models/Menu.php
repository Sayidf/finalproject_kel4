<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'menu';
    //mapping ke kolom/fieldnya
    protected $fillable = ['id_kategori', 'nama', 'harga', 'ket', 'foto'];
    //relasi one to many ke tabel pegawai
    // public function pegawai()
    // {
    //     return $this->hasMany(Pegawai::class);
    // }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
