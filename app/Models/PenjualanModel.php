<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = "penjualan";

    protected $fillable = [
        'id_sparepart',
        'nama',
        'jenis',
        'harga_total',
        'jumlah',
        'diskon',
    ];
}
