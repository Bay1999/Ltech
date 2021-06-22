<?php

namespace App\Http\Controllers;

use App\Models\ServisModel;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class ServisController extends Controller
{
    public function masuk()
    {
        $servisMasuk = ServisModel::where('flag', '=', 'masuk')->latest()->simplePaginate(10);

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

        $qrcode = $servis->qrcode;
        $qrcodeData = base64_encode(asset($servis->qrcode));
        $src = 'data:' . mime_content_type($qrcode) . ';base64,' . $qrcodeData;

        return view('layouts.pdf.servisMasuk', compact('servis', 'src'));
        // $pdf = PDF::loadview('layouts.pdf.servisMasuk', compact('servis'));
        // return $pdf->download('Servis Masuk.pdf');
    }
}
