@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section -->
<div class="p-5 mb-5 glass-card position-relative overflow-hidden">
    <!-- Dekorasi background abstrak -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top right, rgba(41,98,255,0.1), transparent 50%), radial-gradient(circle at bottom left, rgba(0,200,83,0.1), transparent 50%); z-index: 0;"></div>
    
    <div class="container-fluid py-5 text-center position-relative" style="z-index: 1;">
        <h1 class="display-4 fw-bold mb-3 text-dark">Selamat Datang di Toko Online Kami</h1>
        <p class="col-md-8 mx-auto fs-5 mb-4 text-muted">Temukan berbagai produk berkualitas dengan harga terbaik, hanya di genggaman Anda.</p>
        <a class="btn btn-primary btn-lg rounded-pill px-5 fw-bold" href="{{ route('frontend.katalog') }}" type="button" style="box-shadow: 0 5px 15px rgba(13,110,253,0.3);">Mulai Belanja Sekarang</a>
    </div>
</div>

<!-- Featured Products -->
<h2 class="mb-4 text-center">Produk Terbaru</h2>
<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    @forelse($produks as $produk)
    <div class="col">
        <div class="card h-100 shadow-sm border-0 product-card">
            @if($produk->foto)
                <img src="{{ asset('storage/img-produk/' . $produk->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;">
            @elseif($produk->foto_produk && $produk->foto_produk->count() > 0)
                <img src="{{ asset('storage/img-produk/' . $produk->foto_produk->first()->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/200" class="card-img-top" alt="Placeholder">
            @endif
            <div class="card-body d-flex flex-column p-4">
                <h5 class="card-title fw-bold">{{ $produk->nama_produk }}</h5>
                <p class="card-text text-danger fw-bold fs-5">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <a href="{{ route('frontend.detail', $produk->id) }}" class="btn btn-outline-primary mt-auto rounded-pill fw-semibold">Detail Produk</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
        <p class="mt-3 fs-5 text-muted">Belum ada produk untuk saat ini.</p>
    </div>
    @endforelse
</div>
@endsection
