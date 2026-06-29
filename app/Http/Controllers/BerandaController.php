<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function BerandaBackend()
    { 
        $totalUser = User::count();
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalTransaksi = Transaksi::count();
        $totalPendapatan = Transaksi::where('status', 'selesai')->sum('total_harga');

        // Data chart: Pendapatan 6 bulan terakhir
        $chartData = Transaksi::select(
            DB::raw('sum(total_harga) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthKey")
        )
        ->where('status', 'selesai')
        ->groupBy('months', 'monthKey')
        ->orderBy('monthKey', 'desc')
        ->take(6)
        ->get()
        ->reverse();

        $labels = $chartData->pluck('months');
        $data = $chartData->pluck('sums');

        return view('backend.v_beranda.index', [
            'judul'=> 'Halaman Beranda',
            'totalUser' => $totalUser,
            'totalProduk' => $totalProduk,
            'totalKategori' => $totalKategori,
            'totalTransaksi' => $totalTransaksi,
            'totalPendapatan' => $totalPendapatan,
            'chartLabels' => $labels,
            'chartData' => $data
        ]);
    }
}
