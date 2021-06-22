<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeknisiModel extends Model
{
    use HasFactory;

    protected $table = "teknisi";

    protected $fillable = [
        'nama',
        'alamat',
        'telp',
        'job',
        'foto',
    ];
}
