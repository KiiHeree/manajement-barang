<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CatatanTransaksi;
use App\Models\Penerimaan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $totalTransaksi = CatatanTransaksi::whereDate('created_at', Carbon::today()->toDateString())->count();
        $penerimaan = Penerimaan::whereDate('created_at', Carbon::today()->toDateString())->count();
        $pengiriman = Pengiriman::whereDate('created_at', Carbon::today()->toDateString())->count();
        $stokMenipis = Barang::where('stok', '<=', 100)->get();
        $transaksiBaru = CatatanTransaksi::whereDate('created_at', Carbon::today()->toDateString())->get();
        return view('app.dashboard.index', compact('stokMenipis', 'transaksiBaru','barang','totalTransaksi','penerimaan','pengiriman'));
    }

    public function getData()
    {
        $tahun = date('Y'); // kalo ga ada, default tahun sekarang $request->tahun ??

        $dataPenerimaan = [];
        $dataPengiriman = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // ambil jumlah penerimaan per bulan
            $jumlahPenerimaan = Penerimaan::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->count();

            $dataPenerimaan[] = $jumlahPenerimaan;

            // ambil jumlah pengiriman per bulan
            $jumlahPengiriman = Pengiriman::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->count();

            $dataPengiriman[] = $jumlahPengiriman;
        }

        return response()->json([
            'penerimaan' => $dataPenerimaan,
            'pengiriman' => $dataPengiriman
        ]);
    }
}
