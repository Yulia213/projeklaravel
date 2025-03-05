<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->string('nisn', 20)->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan'])->nullable();
            $table->integer('jumlah_pinjam')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('set null');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
