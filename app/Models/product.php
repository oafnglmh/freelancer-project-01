<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Specifies the table name for the model
    protected $fillable = [
        'sp_ma',
        'sp_ten',
        'sp_giaGoc',
        'sp_giaBan',
        'sp_hinh',
        'sp_thongTin',
        'sp_taoMoi',
        'sp_capNhat',
        'sp_trangThai',
        'sp_sale'
    ]; // Specifies the columns that can be mass-assigned

   // Relationship with Statusproduct model
public function status_product()
{
    return $this->belongsTo(Statusproduct::class, 'sp_trangThai', 'id');
}

// Relationship with Color model
public function color_product()
{
    return $this->belongsTo(Color::class, 'color_id', 'id');
}

// Relationship with Typeproduct model
public function type_Product()
{
    return $this->belongsTo(Typeproduct::class, 'l_ma', 'id');
}

}
