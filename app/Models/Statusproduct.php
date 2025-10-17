<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusproduct extends Model
{
    use HasFactory;
    protected $table = 'status_products';
    protected $fillable = ['id','name_status']; // Các cột bạn muốn thêm vào SELECT


}
