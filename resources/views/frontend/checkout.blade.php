@extends('frontend.layouts.app')

@section('content')
<div class="glass-card p-4 mb-4 mt-4">
    <h2 class="mb-0 text-center fw-bold">Checkout Pembayaran</h2>
</div>

@if(session('error'))
    <div class="alert alert-danger rounded-pill shadow-sm border-0">{{ session('error') }}</div>
@endif

<div class="row">
    <div class="col-md-7">
        <div class="glass-card p-4 mb-4">
            <h4 class="fw-bold mb-4">Informasi Pengiriman</h4>
            <form action="{{ route('frontend.prosesCheckout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Nama Penerima</label>
                    <input type="text" name="nama_penerima" class="form-control form-control-lg rounded-pill bg-light border-0 shadow-sm px-4" required value="{{ Auth::user()->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Nomor HP / WhatsApp</label>
                    <input type="text" name="hp" class="form-control form-control-lg rounded-pill bg-light border-0 shadow-sm px-4" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-semibold ms-2">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control rounded-4 bg-light border-0 shadow-sm p-3" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted fw-semibold ms-2">Catatan Pesanan (Opsional)</label>
                    <textarea name="catatan" class="form-control rounded-4 bg-light border-0 shadow-sm p-3" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow">Proses Pesanan Sekarang <i class="bi bi-check-circle ms-1"></i></button>
            </form>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="glass-card p-4">
            <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>
            
            <div class="table-responsive mb-3">
                <table class="table table-borderless align-middle mb-0">
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td class="ps-0" style="width: 60px;">
                                @if($item['foto'])
                                    <img src="{{ asset('storage/img-produk/' . $item['foto']) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/50" class="rounded shadow-sm">
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold text-truncate" style="max-width: 150px;">{{ $item['nama_produk'] }}</div>
                                <small class="text-muted">{{ $item['qty'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</small>
                            </td>
                            <td class="text-end pe-0 fw-bold">
                                Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr class="text-muted">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Subtotal</span>
                <span class="fw-bold">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Biaya Pengiriman</span>
                <span class="fw-bold text-success">Gratis</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="fs-5 fw-bold">Total Pembayaran</span>
                <span class="fs-5 fw-bold text-danger">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
