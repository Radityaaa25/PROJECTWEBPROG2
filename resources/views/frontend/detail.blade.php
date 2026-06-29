@extends('frontend.layouts.app')

@section('content')
<div class="glass-card p-5 mb-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            @if($produk->foto)
                <img src="{{ asset('storage/img-produk/' . $produk->foto) }}" class="img-fluid rounded-4 shadow w-100" style="object-fit: cover; max-height: 500px;" alt="{{ $produk->nama_produk }}">
            @elseif($produk->foto_produk && $produk->foto_produk->count() > 0)
                <img src="{{ asset('storage/img-produk/' . $produk->foto_produk->first()->foto) }}" class="img-fluid rounded-4 shadow w-100" style="object-fit: cover; max-height: 500px;" alt="{{ $produk->nama_produk }}">
            @else
                <img src="https://via.placeholder.com/500" class="img-fluid rounded-4 shadow w-100" alt="Placeholder">
            @endif
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class="fw-bold display-6 mb-3">{{ $produk->nama_produk }}</h2>
            <h3 class="text-danger fw-bold mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h3>
            
            <div class="mb-4">
                <span class="badge bg-secondary me-2 fs-6"><i class="bi bi-tag-fill me-1"></i> {{ $produk->kategori->nama_kategori ?? 'Tidak ada kategori' }}</span>
                <span class="badge bg-info text-dark me-2 fs-6"><i class="bi bi-box-seam me-1"></i> Stok: {{ $produk->stok }}</span>
                <span class="badge bg-light text-dark border fs-6"><i class="bi bi-speedometer2 me-1"></i> Berat: {{ $produk->berat }} gr</span>
            </div>

            <h5 class="fw-bold mt-2">Deskripsi Produk</h5>
            <div class="mb-4 text-muted" style="line-height: 1.8;">
                {!! $produk->detail !!}
            </div>

            <div class="mt-auto">
                <form action="{{ route('frontend.tambahKeranjang', $produk->id) }}" method="POST" class="d-flex align-items-center bg-light p-3 rounded-4 shadow-sm" style="background: rgba(255,255,255,0.5) !important;">
                    @csrf
                    <input type="number" name="qty" value="1" min="1" max="{{ $produk->stok }}" class="form-control form-control-lg me-3 rounded-pill text-center border-0 shadow-sm" style="width: 100px;">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill w-100 fw-bold shadow-sm"><i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
