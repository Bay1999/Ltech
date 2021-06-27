<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisModel extends Model
{
    use HasFactory;

    protected $table = "servis";

    protected $fillable = [
        'invoice',
        'nama_barang',
        'tgl_masuk',
        'nama_customer',
        'telp',
        'keluhan',
        'kelengkapan',
        'tgl_keluar',
        'nama_pengambil',
        'part_diganti',
        'biaya',
        'qrcode',
        'flag',
        'status',
    ];
}
