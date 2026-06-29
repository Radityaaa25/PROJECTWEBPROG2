@extends('backend.v_layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title mb-0"> {{ $judul }} </h5>
            <form action="{{ route('backend.transaksi.index') }}" method="GET" class="form-inline">
              <label for="bulan" class="mr-2">Bulan:</label>
              <select name="bulan" id="bulan" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                @for($i = 1; $i <= 12; $i++)
                  <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                  </option>
                @endfor
              </select>
              
              <label for="tahun" class="mr-2">Tahun:</label>
              <select name="tahun" id="tahun" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua</option>
                @for($i = date('Y'); $i >= date('Y') - 5; $i--)
                  <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>
                    {{ $i }}
                  </option>
                @endfor
              </select>
            </form>
          </div>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Penerima</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($index as $row)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $row->kode_transaksi }} </td>
                    <td> {{ $row->created_at->format('d-m-Y H:i') }} </td>
                    <td> {{ $row->nama_penerima }} </td>
                    <td> Rp. {{ number_format($row->total_harga, 0, ',', '.') }} </td>
                    <td>
                      @php
                        $badge = [
                          'pending' => 'badge-secondary',
                          'diproses' => 'badge-info',
                          'dikirim' => 'badge-primary',
                          'selesai' => 'badge-success',
                          'dibatalkan' => 'badge-danger',
                        ][$row->status] ?? 'badge-secondary';
                      @endphp
                      <span class="badge {{ $badge }}"> {{ ucfirst($row->status) }} </span>
                    </td>
                    <td>
                      <a href="{{ route('backend.transaksi.show', $row->id) }}" title="Detail Data">
                        <button type="button" class="btn btn-cyan btn-sm"><i class="far fa-eye"></i> Detail</button>
                      </a>
                      <form method="POST" action="{{ route('backend.transaksi.destroy', $row->id) }}"
                        style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm show_confirm"
                          data-konf-delete="{{ $row->kode_transaksi }}" title='Hapus Data'>
                          <i class="fas fa-trash"></i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection