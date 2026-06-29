@extends('frontend.layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-6 my-5">
        <div class="glass-card shadow-lg border-0" style="backdrop-filter: blur(20px); border-radius: 25px; overflow: hidden;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3 shadow" style="width: 70px; height: 70px;">
                        <i class="bi bi-person-plus-fill fs-1"></i>
                    </div>
                    <h3 class="fw-bold">Buat Akun Baru</h3>
                    <p class="text-muted">Daftar untuk mulai berbelanja</p>
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('frontend.register.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label text-muted fw-semibold ms-2">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-muted fw-semibold ms-2">Alamat Email</label>
                        <input type="email" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="email" name="email" value="{{ old('email') }}" required placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label text-muted fw-semibold ms-2">Nomor HP / WhatsApp</label>
                        <input type="text" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="hp" name="hp" value="{{ old('hp') }}" required placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="password" class="form-label text-muted fw-semibold ms-2">Kata Sandi</label>
                            <input type="password" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="password" name="password" required placeholder="••••••••">
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label text-muted fw-semibold ms-2">Konfirmasi Sandi</label>
                            <input type="password" class="form-control form-control-lg rounded-pill px-4 bg-light border-0 shadow-sm" id="password_confirmation" name="password_confirmation" required placeholder="••••••••">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold shadow">Daftar Sekarang <i class="bi bi-person-check-fill ms-1"></i></button>
                </form>
                
                <div class="mt-4 text-center">
                    <p class="text-muted">Sudah punya akun? <a href="{{ route('frontend.login') }}" class="text-primary fw-bold text-decoration-none">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
