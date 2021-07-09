<?php

namespace App\Http\Controllers;

use App\Models\ServisModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class ServisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function masuk(Request $req)
    {
        $servisMasuk = ServisModel::where('flag', '=', 'masuk')
            ->when($req->query('search'), function ($query, $search) {
                return $query->where('nama_customer', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('invoice', 'like', '%' . $search . '%');
            })
            ->latest()
            ->simplePaginate(10);

        return view('layouts.servis.index', compact('servisMasuk'));
    }

    public function create()
    {
        return view('layouts.servis.add');
    }

    public function store(Request $req)
    {
        $invoice = rand();
        QrCode::size(500)->format('svg')->generate($invoice, public_path('images/qrcode/' . $invoice . '.svg'));

        // dd($req);
        ServisModel::create([
            'invoice' => $invoice,
            'nama_barang' => $req->nama,
            'tgl_masuk' => $req->tgl_masuk,
            'telp' => $req->telp,
            'nama_customer' => $req->nm_customer,
            'keluhan' => $req->keluhan,
            'kelengkapan' => $req->kelengkapan,
            'qrcode' => 'images/qrcode/' . $invoice . '.svg',
            'flag' => 'masuk',
        ]);

        return redirect()->route('servis.masuk');
    }

    public function cetak($id)
    {
        $servis = ServisModel::find($id);

        // $qrcode = $servis->qrcode;
        // $qrcodeData = base64_encode(asset($servis->qrcode));
        // $src = 'data:' . mime_content_type($qrcode) . ';base64,' . $qrcodeData;

        return view('layouts.pdf.servisMasuk', compact('servis'));
        // $pdf = PDF::loadview('layouts.pdf.servisMasuk', compact('servis'));
        // return $pdf->download('Servis Masuk.pdf');
    }

    public function cetakAll(Request $req)
    {
        $monthNow = Carbon::now()->format('m');
        $datas = ServisModel::whereMonth('created_at', $monthNow)
            ->when($req->query('servis'), function ($query, $servis) {
                return $query->where('flag', $servis);
            })
            ->get();
        // dd($monthNow);
        return view('layouts.pdf.laporanServisMasuk', compact('datas'));
    }

    public function ambil($id)
    {
        $id_servis = $id;

        return view('layouts.servis.ambil', compact('id_servis'));
    }

    public function simpan_ambil(Request $request)
    {
        $servis = ServisModel::find($request->id_servis);
        $tgl_sekarang = Carbon::now();

        // dd($tgl_sekarang->format('Y-m-d'));
        $servis->update([
            'tgl_keluar' => $tgl_sekarang->format('Y-m-d'),
            'nama_pengambil' => $request->nama_pengambil,
            'flag' => 'keluar',
        ]);

        return redirect()->route('servis.keluar');
    }


    public function selesai($id)
    {
        $id_servis = $id;
        return view('layouts.servis.selesai', compact('id_servis'));
    }


    public function simpan_selesai(Request $request)
    {
        $servis = ServisModel::find($request->id_servis);
        // dd($tgl_sekarang->format('Y-m-d'));
        $servis->update([
            'biaya' => $request->biaya,
            'part_diganti' => $request->part_diganti,
            'status' => 'selesai',
        ]);

        return redirect()->route('servis.masuk');
    }

    public function keluar()
    {
        $servisKeluar = ServisModel::where('flag', '=', 'keluar')
            ->latest()
            ->simplePaginate(10);

        return view('layouts.servis.keluar.index', compact('servisKeluar'));
    }
    public function keluarCetak($id)
    {
        $servis = ServisModel::find($id);

        return view('layouts.pdf.servisKeluar', compact('servis'));
    }
}
