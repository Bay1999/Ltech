<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TeknisiModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataTeknisi = TeknisiModel::latest()->simplePaginate(10);
        return view('layouts.teknisi.index', compact('dataTeknisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.teknisi.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $namaFoto = rand() . '.' . $request->foto->extension();
        $request->foto->move('images/teknisi/', $namaFoto);

        $store = TeknisiModel::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'job' => $request->job,
            'alamat' => $request->alamat,
            'foto' => 'images/teknisi/' . $namaFoto,
        ]);

        $simpan = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'type' => 'teknisi',
            'password' => Hash::make($request->password),
        ]);

        if ($store && $simpan) {
            return redirect()->route('teknisi.index')->with('success', 'Berhasil menambahkan data teknisi baru');
        } else {
            return redirect()->route('teknisi.index')->with('failed', 'Gagal menambahkan data teknisi baru');
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
        $dataTeknisi = TeknisiModel::find($id);

        return view('layouts.teknisi.edit', compact('dataTeknisi'));
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
        $dataTeknisi = TeknisiModel::find($id);

        if ($request->file('foto') != "") {
            $namaFoto = rand() . '.' . $request->foto->extension();
            $request->foto->move('images/teknisi/', $namaFoto);

            if (file_exists($dataTeknisi->foto)) {
                @unlink($dataTeknisi->foto);

                $dataTeknisi->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'job' => $request->job,
                    'alamat' => $request->alamat,
                    'foto' => 'images/teknisi/' . $namaFoto,
                ]);
            } else {
                $dataTeknisi->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'job' => $request->job,
                    'alamat' => $request->alamat,
                    'foto' => 'images/teknisi/' . $namaFoto,
                ]);
            }
        } else {
            $dataTeknisi->update([
                'nama' => $request->nama,
                'telp' => $request->telp,
                'job' => $request->job,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->route('teknisi.index')->with('success', 'Berhasil merubah data teknisi baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataTeknisi = TeknisiModel::find($id);
        $user = User::where('name', $dataTeknisi->nama)->first();

        if (file_exists($dataTeknisi->foto)) {
            @unlink($dataTeknisi->foto);
            $dataTeknisi->delete();
            $user->delete();
        } else {
            $dataTeknisi->delete();
            $user->delete();
        }

        return redirect()->route('teknisi.index')->with('success', 'Berhasil menghapus data teknisi');
    }
}
