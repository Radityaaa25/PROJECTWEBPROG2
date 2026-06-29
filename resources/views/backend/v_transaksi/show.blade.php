@extends('backend.v_layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Item Pesanan</h4>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($show->detail as $item)
                    <tr>
                      <td> {{ $loop->iteration }} </td>
                      <td> {{ $item->produk->nama_produk ?? '-' }} </td>
                      <td> Rp. {{ number_format($item->harga, 0, ',', '.') }} </td>
                      <td> {{ $item->jumlah }} </td>
                      <td> Rp. {{ number_format($item->subtotal, 0, ',', '.') }} </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">Belum ada item pesanan</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th> Rp. {{ number_format($show->total_harga, 0, ',', '.') }} </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi Transaksi</h4>
            <p><strong>Kode:</strong> {{ $show->kode_transaksi }} </p>
            <p><strong>Tanggal:</strong> {{ $show->created_at->format('d-m-Y H:i') }} </p>
            <p><strong>Penerima:</strong> {{ $show->nama_penerima }} </p>
            <p><strong>No. HP:</strong> {{ $show->hp }} </p>
            <p><strong>Alamat:</strong> {{ $show->alamat }} </p>
            <p><strong>Catatan:</strong> {{ $show->catatan ?? '-' }} </p>
            <hr>
            <form action="{{ route('backend.transaksi.updateStatus', $show->id) }}" method="post">
              @method('put')
              @csrf
              <div class="form-group">
                <label>Status Pesanan</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                  @foreach (['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'] as $st)
                    <option value="{{ $st }}" {{ $show->status == $st ? 'selected' : '' }}> {{ ucfirst($st) }} </option>
                  @endforeach
                </select>
                @error('status')
                  <span class="invalid-feedback alert-danger" role="alert"> {{ $message }} </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Perbarui Status</button>
              <a href="{{ route('backend.transaksi.index') }}">
                <button type="button" class="btn btn-secondary">Kembali</button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection