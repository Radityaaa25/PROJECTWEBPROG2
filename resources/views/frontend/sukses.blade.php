@extends('frontend.layouts.app')

@section('content')
<div class="row justify-content-center align-items-center mt-5">
    <div class="col-md-6">
        <div class="glass-card p-5 text-center shadow-lg border-0" style="border-radius: 30px;">
            <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle mb-4 shadow" style="width: 100px; height: 100px;">
                <i class="bi bi-check2-circle" style="font-size: 4rem;"></i>
            </div>
            <h2 class="fw-bold mb-3">Pesanan Berhasil!</h2>
            <p class="text-muted mb-4 fs-5">Terima kasih telah berbelanja di Toko Online kami. Pesanan Anda sedang kami proses.</p>
            
            <div class="bg-light p-4 rounded-4 text-start mb-4 shadow-sm border-0" style="background: rgba(255,255,255,0.5) !important;">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Kode Transaksi:</span>
                    <span class="fw-bold text-primary">{{ $transaksi->kode_transaksi }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Penerima:</span>
                    <span class="fw-semibold">{{ $transaksi->nama_penerima }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Status:</span>
                    <span class="badge bg-warning text-dark px-3 rounded-pill">Pending</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mt-2">
                    <span class="fw-bold">Total Pembayaran:</span>
                    <span class="fw-bold text-danger fs-5">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>

            <a href="{{ route('frontend.katalog') }}" class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow">Kembali Belanja</a>
        </div>
    </div>
</div>
@endsection
