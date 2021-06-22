<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\SparepartModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPenjualan = PenjualanModel::latest()->simplePaginate(10);
        return view('layouts.sparepart.penjualan.index', compact('dataPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSparepart = SparepartModel::get();

        return view('layouts.sparepart.penjualan.add', compact('dataSparepart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataSparepart = SparepartModel::find($request->id_sparepart);

        if ($request->diskon > 0) {
            $hargaTotal = ($dataSparepart->harga_jual * $request->diskon / 100) * $request->jumlah;
        } else {
            $hargaTotal = $dataSparepart->harga_jual * $request->jumlah;
        }

        $store = PenjualanModel::create([
            'id_sparepart' => $request->id_sparepart,
            'nama' => $dataSparepart->nama,
            'jenis' => $dataSparepart->jenis,
            'jumlah' => $request->jumlah,
            'harga_total' => $hargaTotal,
            'diskon' => $request->diskon,
        ]);

        $stokBaru = $dataSparepart->stok - $request->jumlah;
        // dd($stokBaru);
        $dataSparepart->update([
            'stok' => $stokBaru
        ]);

        if ($store) {
            return redirect()->route('sparepart.penjualan.index')->with('success', 'Berhasil menambahkan data penjualan sparepart baru');
        } else {
            return redirect()->route('sparepart.penjualan.index')->with('failed', 'Gagal menambahkan data penjualan sparepart baru');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = PenjualanModel::find($id);
        $sparePart = SparepartModel::find($penjualan->id_sparepart);

        $stokBaru = $sparePart->stok + $penjualan->jumlah;
        $sparePart->update([
            'stok' => $stokBaru
        ]);

        $penjualan->delete();
        return redirect()->route('sparepart.penjualan.index');
    }
}
