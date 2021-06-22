<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianModel extends Model
{
    use HasFactory;

    protected $table = "pembelian";

    protected $fillable = [
        'id_sparepart',
        'nama',
        'jenis',
        'harga_beli',
        'jumlah',
        'suplier',
    ];
}
