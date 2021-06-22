<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SparepartModel;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = SparepartModel::latest()->simplePaginate(10);
        return view('layouts.sparepart.data.index', compact('sparepart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.sparepart.data.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = SparepartModel::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ]);

        if ($store) {
            return redirect()->route('sparepart.data.index')->with('success', 'Berhasil menambahkan data sparepart baru');
        } else {
            return redirect()->route('sparepart.data.index')->with('failed', 'Gagal menambahkan data sparepart baru');
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
        $sparepart = SparepartModel::find($id);

        return view('layouts.sparepart.data.edit', compact('sparepart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_harga(Request $req, $id)
    {
        $sparepart = SparepartModel::find($id);
        $sparepart->update([
            'harga_jual' => $req->harga
        ]);

        return redirect()->route('sparepart.data.index')->with('success', 'Berhasil memperbarui harga sparepart');
    }

    public function update(Request $request, $id)
    {
        $sparepart = SparepartModel::find($id);
        $sparepart->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('sparepart.data.index')->with('success', 'Berhasil memperbarui harga sparepart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = SparepartModel::find($id);
        $sparepart->delete();

        return redirect()->route('sparepart.data.index')->with('success', 'Berhasil menghapus data sparepart');
    }
}
