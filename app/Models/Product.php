<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Model Product
    protected $fillable = [
        'NAME',
        'TYPE',
        'KATEGORI',
        'SIZE',
        'SIZE_LENGTH',
        'SIZE_WIDTH',
        'SIZE_HEIGHT',
        'ISI',
        'SATUAN',
        'HARGA',
        'BOM',
        'MESIN',
        'WARNA',
        'STATUS',
        'CREATED_DATE',
        'CREATED_BY'
    ];
}
