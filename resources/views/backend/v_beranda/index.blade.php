@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-top">
                    <h5 class="card-title"> {{$judul}}</h5>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"> Selamat Datang, {{ Auth::user()->nama }}</h4>
                        Aplikasi Toko Online dengan hak akses yang anda miliki sebagai
                        <b>
                            @if (Auth::user()->role == 1)
                                Super Admin
                            @elseif(Auth::user()->role == 0)
                                Admin
                            @endif
                        </b>
                        ini adalah halaman utama dari aplikasi Web Programming.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metrics Cards -->
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                    <h6 class="text-white">Total Users</h6>
                    <h3 class="text-white">{{ $totalUser ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-cube"></i></h1>
                    <h6 class="text-white">Total Produk</h6>
                    <h3 class="text-white">{{ $totalProduk ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-cart"></i></h1>
                    <h6 class="text-white">Total Transaksi</h6>
                    <h3 class="text-white">{{ $totalTransaksi ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                    <h6 class="text-white">Total Pendapatan</h6>
                    <h3 class="text-white">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Pendapatan (6 Bulan Terakhir)</h5>
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('revenueChart').getContext('2d');
            var revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels ?? []) !!},
                    datasets: [{
                        label: 'Total Pendapatan (Rp)',
                        data: {!! json_encode($chartData ?? []) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <!-- contentAkhir -->
@endsection