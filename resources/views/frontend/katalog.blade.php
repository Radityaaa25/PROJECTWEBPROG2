@extends('frontend.layouts.app')

@section('content')
<div class="glass-card p-4 mb-4">
    <h2 class="mb-0 text-center fw-bold">Katalog Produk</h2>
</div>

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

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $produks->links('pagination::bootstrap-5') }}
</div>
@endsection
