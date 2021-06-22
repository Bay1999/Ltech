<?php

namespace App\Http\Controllers;

use App\Models\PembelianModel;
use App\Models\SparepartModel;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPembelian = PembelianModel::latest()->simplePaginate(10);
        return view('layouts.sparepart.pembelian.index', compact('dataPembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSparepart = SparepartModel::get();

        return view('layouts.sparepart.pembelian.add', compact('dataSparepart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sparepart = SparepartModel::find($request->id_sparepart);

        $store = PembelianModel::create([
            'id_sparepart' => $request->id_sparepart,
            'nama' => $sparepart->nama,
            'jenis' => $sparepart->jenis,
            'jumlah' => $request->jumlah,
            'harga_beli' => $request->harga,
            'suplier' => $request->suplier,
        ]);

        $dataSparepart = SparepartModel::find($request->id_sparepart);

        $jumlahStok = $dataSparepart->stok + $request->jumlah;

        $dataSparepart->update([
            'harga_beli' => $request->harga,
            'stok' => $jumlahStok
        ]);

        if ($store) {
            return redirect()->route('sparepart.pembelian.index')->with('success', 'Berhasil menambahkan data pembelian sparepart baru');
        } else {
            return redirect()->route('sparepart.pembelian.index')->with('failed', 'Gagal menambahkan data pembelian sparepart baru');
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
        $dataPembelian = PembelianModel::find($id);
        $dataSparepart = SparepartModel::get();

        return view('layouts.sparepart.pembelian.edit', compact('dataPembelian', 'dataSparepart'));
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
        $sparepartIdBaru = SparepartModel::find($request->id_sparepart);
        $inputanPembelianSebelumnya = PembelianModel::find($id);

        if ($inputanPembelianSebelumnya->id_sparepart == $request->id_sparepart) {
            $stokSebelumInput = $sparepartIdBaru->stok - $inputanPembelianSebelumnya->jumlah;

            $inputanPembelianSebelumnya->update([
                'id_sparepart' => $request->id_sparepart,
                'nama' => $sparepartIdBaru->nama,
                'jenis' => $sparepartIdBaru->jenis,
                'jumlah' => $request->jumlah,
                'harga_beli' => $request->harga,
                'suplier' => $request->suplier,
            ]);

            $stokBaru = $stokSebelumInput + $request->jumlah;

            $sparepartIdBaru->update([
                'harga_beli' => $request->harga,
                'stok' => $stokBaru
            ]);
        } else {
            $sparepartIdLama = SparepartModel::find($inputanPembelianSebelumnya->id_sparepart);

            //mengembalikan stok sparepart id lama
            $stokSebelumInput = $sparepartIdLama->stok - $inputanPembelianSebelumnya->jumlah;
            $sparepartIdLama->update([
                'stok' => $stokSebelumInput
            ]);

            $inputanPembelianSebelumnya->update([
                'id_sparepart' => $request->id_sparepart,
                'nama' => $sparepartIdBaru->nama,
                'jenis' => $sparepartIdBaru->jenis,
                'jumlah' => $request->jumlah,
                'harga_beli' => $request->harga,
                'suplier' => $request->suplier,
            ]);

            //memperbarui harga beli dan stok sparepart id baru
            $stokBaru = $sparepartIdBaru->stok + $request->jumlah;

            $sparepartIdBaru->update([
                'harga_beli' => $request->harga,
                'stok' => $stokBaru
            ]);

            //mengembalikan harga beli sparepart id lama
            $pembelianIdterakhir = PembelianModel::latest()->where('id_sparepart', '=', $sparepartIdLama->id)->first();

            // dd($sparepartIdBaru->id, $pembelianIdterakhir->harga_beli);

            if ($pembelianIdterakhir == null) {
                $sparepartIdLama->update([
                    'harga_beli' => 0,
                ]);
            } else {
                $sparepartIdLama->update([
                    'harga_beli' => $pembelianIdterakhir->harga_beli
                ]);
            }
        }


        return redirect()->route('sparepart.pembelian.index')->with('success', 'Berhasil merubah data pembelian sparepart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = PembelianModel::find($id);
        $sparepart = SparepartModel::find($pembelian->id_sparepart);

        $stok = $sparepart->stok - $pembelian->jumlah;
        if ($stok < 0) {
            $sparepart->update([
                'stok' => 0
            ]);
        } else {
            $sparepart->update([
                'stok' => $stok
            ]);
        }

        $pembelian->delete();

        return redirect()->route('sparepart.pembelian.index')->with('success', 'Berhasil menghapus data pembelian sparepart');
    }
}
