<?php

namespace App\Http\Controllers;

use App\Models\PembelianModel;
use App\Models\PenjualanModel;
use App\Models\ServisModel;
use App\Models\SparepartModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->type == 'admin') {
            return $this->dashboard();
        } elseif (Auth::user()->type == 'teknisi') {
            return redirect()->route('sparepart.data.index');
        } elseif (Auth::user()->type == 'kasir') {
            return redirect()->route('servis.masuk');
        }
    }

    public function dashboard()
    {
        $now = Carbon::now()->format('m');
        $pendapatanServis = ServisModel::where('flag', 'keluar')->whereMonth('tgl_keluar', $now)->sum('biaya');
        $pendapatanPenjualan = PenjualanModel::whereMonth('created_at', $now)->sum('harga_total');
        $totalPendapatan = $pendapatanServis + $pendapatanPenjualan;

        $pembelian = PembelianModel::whereMonth('created_at', $now)->sum('harga_beli');
        $jumlahSparepart = SparepartModel::count();

        $servisProses = ServisModel::where('status', 'proses')->count();
        $date = Carbon::now();

        $monthChart = array();
        $pendapatanBulan = array();
        for ($i = 0; $i < 5; $i++) {
            $monthChart[] =  $date->subMonths($i)->isoFormat('MMMM');
            $servis = ServisModel::whereMonth('tgl_keluar', $date->format('m'))->sum('biaya');
            $penjualan = PenjualanModel::whereMonth('created_at', $date->format('m'))->sum('harga_total');
            $pendapatanBulan[] = $servis + $penjualan;
            $date = Carbon::now();
        }

        $chart = array(
            'month' => $monthChart,
            'data' => $pendapatanBulan,
        );

        $sparepart = SparepartModel::get();

        // $nameSparepart = array();
        // $stokSparepart = array();
        // foreach ($sparepart as $part) {
        //     $nameSparepart[] = $part->name;
        //     $stokSparepart[] = $part->stok;
        // }

        // $pie = array(
        //     'name' => json_encode($nameSparepart),
        //     'stok' => json_encode($stokSparepart)
        // );

        return view('layouts.dashboard', compact('totalPendapatan', 'pembelian', 'jumlahSparepart', 'servisProses', 'chart', 'sparepart'));
    }
}
