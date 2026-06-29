@extends('backend.v_layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"> {{$judul }} </h5>

          <form method="GET" action="{{ route('backend.laporan_penjualan.index') }}" class="form-inline mb-4">
            <div class="form-group mr-2">
              <label class="mr-2">Tanggal Awal</label>
              <input type="date" name="tanggal_awal" class="form-control" value="{{ $tanggal_awal }}" required>
            </div>
            <div class="form-group mr-2">
              <label class="mr-2">Tanggal Akhir</label>
              <input type="date" name="tanggal_akhir" class="form-control" value="{{ $tanggal_akhir }}" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Tampilkan</button>
            @if ($tanggal_awal && $tanggal_akhir)
              <a href="{{ route('backend.laporan_penjualan.cetak', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir]) }}"
                target="_blank" class="btn btn-danger mr-2">
                <i class="fas fa-file-pdf"></i> Cetak PDF
              </a>
              <a href="{{ route('backend.laporan_penjualan.excel', ['tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir]) }}"
                target="_blank" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Cetak Excel
              </a>
            @endif
          </form>

          @if ($tanggal_awal && $tanggal_akhir)
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Penerima</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($index as $row)
                    <tr>
                      <td> {{ $loop->iteration }} </td>
                      <td> {{ $row->kode_transaksi }} </td>
                      <td> {{ $row->created_at->format('d-m-Y H:i') }} </td>
                      <td> {{ $row->nama_penerima }} </td>
                      <td>Rp. {{ number_format($row->total_harga, 0, ',', '.') }} </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">Tidak ada penjualan selesai pada rentang tanggal ini</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-right">Total Penjualan</th>
                    <th>Rp. {{ number_format($total, 0, ',', '.') }} </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          @else
            <div class="alert alert-info">Pilih rentang tanggal lalu klik <strong>Tampilkan</strong>.</div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection