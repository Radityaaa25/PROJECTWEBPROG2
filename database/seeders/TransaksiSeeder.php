<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        Transaksi::create([
            'kode_transaksi' => 'TRX-' . date('Ymd') . '-0001',
            'user_id' => null,
            'nama_penerima' => 'Budi Santoso',
            'hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 1, Jakarta',
            'total_harga' => 150000,
            'status' => 'pending',
            'catatan' => 'Tolong dikemas rapi',
        ]);

        Transaksi::create([
            'kode_transaksi' => 'TRX-' . date('Ymd') . '-0002',
            'user_id' => null,
            'nama_penerima' => 'Siti Aminah',
            'hp' => '081298765432',
            'alamat' => 'Jl. Kenanga No. 5, Bandung',
            'total_harga' => 75000,
            'status' => 'selesai',
            'catatan' => null,
        ]);
    }
}