<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $transaksi = collect();
        $total = 0;

        if ($tanggalAwal && $tanggalAkhir) {
            $transaksi = Transaksi::where('status', 'selesai')
                ->whereBetween('created_at', [
                    $tanggalAwal . ' 00:00:00',
                    $tanggalAkhir . ' 23:59:59',
                ])
                ->orderBy('created_at', 'asc')
                ->get();
            $total = $transaksi->sum('total_harga');
        }

        return view('backend.v_laporan_penjualan.index', [
            'judul' => 'Laporan Penjualan',
            'index' => $transaksi,
            'total' => $total,
            'tanggal_awal' => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir,
        ]);
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $transaksi = Transaksi::where('status', 'selesai')
            ->whereBetween('created_at', [
                $tanggalAwal . ' 00:00:00',
                $tanggalAkhir . ' 23:59:59',
            ])
            ->orderBy('created_at', 'asc')
            ->get();

        $total = $transaksi->sum('total_harga');

        $pdf = Pdf::loadView('backend.v_laporan_penjualan.cetak', [
            'index' => $transaksi,
            'total' => $total,
            'tanggal_awal' => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir,
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-penjualan-' . $tanggalAwal . '-sd-' . $tanggalAkhir . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\PenjualanExport($tanggalAwal, $tanggalAkhir),
            'laporan-penjualan-' . $tanggalAwal . '-sd-' . $tanggalAkhir . '.xlsx'
        );
    }
}