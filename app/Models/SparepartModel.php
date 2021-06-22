<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartModel extends Model
{
    use HasFactory;

    protected $table = "sparepart";

    protected $fillable = [
        'nama',
        'jenis',
        'harga_beli',
        'harga_jual',
        'stok',
        'suplier',
    ];
}
