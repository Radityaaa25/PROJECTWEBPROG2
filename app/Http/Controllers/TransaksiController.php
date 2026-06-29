<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::orderBy('created_at', 'desc');

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('created_at', $request->tahun);
        }

        $transaksi = $query->get();
        return view('backend.v_transaksi.index', [
            'judul' => 'Data Transaksi',
            'index' => $transaksi,
        ]);
    }

    public function show(string $id)
    {
        $transaksi = Transaksi::with('detail.produk')->findOrFail($id);
        return view('backend.v_transaksi.show', [
            'judul' => 'Detail Transaksi',
            'show' => $transaksi,
        ]);
    }

    public function updateStatus(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan',
        ], [
            'status.required' => 'Status pesanan harus dipilih.',
            'status.in' => 'Status pesanan tidak valid.',
        ]);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => $validatedData['status']]);
        return redirect()->route('backend.transaksi.show', $id)->with('success', 'Status transaksi berhasil diperbaharui');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('backend.transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}