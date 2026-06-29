<table>
    <thead>
        <tr>
            <th colspan="6" style="text-align: center; font-weight: bold; font-size: 14px;">
                LAPORAN PENJUALAN TOKO ONLINE
            </th>
        </tr>
        <tr>
            <th colspan="6" style="text-align: center;">
                Periode: {{ \Carbon\Carbon::parse($tanggal_awal)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d/m/Y') }}
            </th>
        </tr>
        <tr>
            <th colspan="6"></th>
        </tr>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Kode Transaksi</th>
            <th style="font-weight: bold;">Tanggal</th>
            <th style="font-weight: bold;">Penerima</th>
            <th style="font-weight: bold;">Items</th>
            <th style="font-weight: bold;">Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($index as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->kode_transaksi }}</td>
                <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $row->nama_penerima }}</td>
                <td>
                    @foreach($row->detail as $detail)
                        {{ $detail->produk->nama_produk }} ({{ $detail->jumlah }}x)<br>
                    @endforeach
                </td>
                <td>{{ $row->total_harga }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" style="text-align: right; font-weight: bold;">Total Keseluruhan:</td>
            <td style="font-weight: bold;">{{ $total }}</td>
        </tr>
    </tbody>
</table>
