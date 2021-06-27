<?php

namespace App\Http\Controllers;

use App\Models\ServisModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function search($search)
    {
        // $list = DB::table('buku')->where('nama', 'like', '%' . $search . '%')->get();
        $list = ServisModel::where('nama_customer', 'like', '%' . $search . '%')->orWhere('nama_barang', 'like', '%' . $search . '%')->get();
        // $list = ServisModel::where('nama_customer', 'like', '%' . $search . '%')->get();
        return response()->json($list, 200);
    }
}
