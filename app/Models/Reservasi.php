<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    //mapping ke kolom/fieldnya
    protected $fillable = ['tgl_reservasi', 'jam_in', 'jam_out', 'status', 'id_meja', 'id_users', 'jml_orang'];

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_users');
    }
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }
}
