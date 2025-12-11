<?php

namespace App\Http\Controllers;

use App\Models\CatatanTransaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporan = [];
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $laporan = CatatanTransaksi::whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        } elseif ($request->tanggal_awal && $request->tanggal_akhir && $request->tipe) {
            $laporan = CatatanTransaksi::where('tipe', $request->tipe)->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        } else {
            $laporan = [];
        }

        return view('app.laporan.index', compact('laporan'));
    }
}
