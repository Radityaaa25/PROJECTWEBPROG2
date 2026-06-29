<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenjualanExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $tanggalAwal;
    protected $tanggalAkhir;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    public function view(): View
    {
        $transaksi = Transaksi::where('status', 'selesai')
            ->whereBetween('created_at', [
                $this->tanggalAwal . ' 00:00:00',
                $this->tanggalAkhir . ' 23:59:59',
            ])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('backend.v_laporan_penjualan.excel', [
            'index' => $transaksi,
            'total' => $transaksi->sum('total_harga'),
            'tanggal_awal' => $this->tanggalAwal,
            'tanggal_akhir' => $this->tanggalAkhir,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size' => 14]],
            2    => ['font' => ['bold' => true]],
        ];
    }
}
