<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    protected $fillable = ['orders_id', 'menu_id', 'quantityOrder'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
