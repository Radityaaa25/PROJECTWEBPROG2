<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->double('harga')->default(0);
            $table->integer('jumlah')->default(1);
            $table->double('subtotal')->default(0);
            $table->timestamps();
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};