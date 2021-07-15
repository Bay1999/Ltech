<?php

namespace App\Http\Controllers;

use App\Models\ServisModel;
use App\Models\TeknisiModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Request $req)
    {
        if ($req->query('search') != null) {
            $search = true;
            $servis = ServisModel::when($req->query('search'), function ($query, $search) {
                return $query->where('nama_customer', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('invoice', 'like', '%' . $search . '%');
            })
                ->latest()
                ->simplePaginate(10);
        } else {
            $search = false;
            $servis = null;
        }

        $Teknisi = TeknisiModel::get();


        return view('index', compact('search', 'servis', 'Teknisi'));
    }
}
