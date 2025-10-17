<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrders extends Model
{
    use HasFactory;
    protected $table = 'status_orders';
    protected $fillable = ['id','name']; // Các cột bạn muốn thêm vào SELECT


}
