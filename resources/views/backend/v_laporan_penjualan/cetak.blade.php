<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Laporan Penjualan</title>
  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
      color: #000;
    }

    h2 {
      text-align: center;
      margin-bottom: 0;
    }

    p.periode {
      text-align: center;
      margin-top: 4px;
      margin-bottom: 16px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #000;
      padding: 6px;
    }

    th {
      background: #eee;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>

<body>
  <h2>Laporan Penjualan</h2>
  <p class="periode">
    Periode: {{ \Carbon\Carbon::parse($tanggal_awal)->format('d-m-Y') }} s/d
    {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d-m-Y') }}
  </p>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Tanggal</th>
        <th>Penerima</th>
        <th class="text-right">Total</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($index as $row)
        <tr>
          <td class="text-center"> {{ $loop->iteration }} </td>
          <td> {{ $row->kode_transaksi }} </td>
          <td> {{ $row->created_at->format('d-m-Y H:i') }} </td>
          <td> {{ $row->nama_penerima }} </td>
          <td class="text-right">Rp. {{ number_format($row->total_harga, 0, ',', '.') }} </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">Tidak ada data</td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4" class="text-right">Total Penjualan</th>
        <th class="text-right">Rp. {{ number_format($total, 0, ',', '.') }} </th>
      </tr>
    </tfoot>
  </table>

  <p style="margin-top: 30px; text-align: right;">Dicetak pada: {{ date('d-m-Y H:i') }} </p>
</body>

</html>