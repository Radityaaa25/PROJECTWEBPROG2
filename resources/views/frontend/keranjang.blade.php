@extends('frontend.layouts.app')

@section('content')
<div class="glass-card p-4 mb-4 mt-4">
    <h2 class="mb-0 text-center fw-bold">Keranjang Belanja</h2>
</div>

@if(session('success'))
    <div class="alert alert-success rounded-pill shadow-sm border-0">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger rounded-pill shadow-sm border-0">{{ session('error') }}</div>
@endif

<div class="row">
    <div class="col-md-8">
        <div class="glass-card p-4 mb-4">
            @if(count($cart) > 0)
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th style="width: 120px;">Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item['foto'])
                                            <img src="{{ asset('storage/img-produk/' . $item['foto']) }}" class="rounded shadow-sm me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <img src="https://via.placeholder.com/60" class="rounded shadow-sm me-3">
                                        @endif
                                        <span class="fw-semibold">{{ $item['nama_produk'] }}</span>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('frontend.updateKeranjang', $id) }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="form-control form-control-sm text-center rounded-pill me-2 border-0 shadow-sm" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td class="fw-bold text-primary">Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('frontend.hapusKeranjang', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Keranjang Anda masih kosong</h4>
                    <p class="text-muted">Silakan cari produk yang Anda inginkan di katalog kami.</p>
                    <a href="{{ route('frontend.katalog') }}" class="btn btn-primary btn-lg rounded-pill mt-2 shadow-sm px-4">Mulai Belanja</a>
                </div>
            @endif
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="glass-card p-4">
            <h5 class="card-title fw-bold mb-4">Ringkasan Belanja</h5>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Total Harga</span>
                <span class="fw-bold fs-5 text-danger">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
            </div>
            <hr class="text-muted">
            @if(count($cart) > 0)
                <a href="{{ route('frontend.checkout') }}" class="btn btn-success btn-lg w-100 rounded-pill shadow-sm fw-bold">Lanjut ke Pembayaran <i class="bi bi-arrow-right-short"></i></a>
            @else
                <button class="btn btn-secondary btn-lg w-100 rounded-pill shadow-sm fw-bold disabled">Lanjut ke Pembayaran <i class="bi bi-arrow-right-short"></i></button>
            @endif
        </div>
    </div>
</div>
@endsection
