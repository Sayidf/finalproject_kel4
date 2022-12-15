<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';

    protected $fillable = ['fullname', 'username', 'email', 'no_hp', 'password', 'created_at'];

    public function reservasi()
    {
        return $this->hasOne(Reservasi::class);
    }
}
