<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('edukasi', function (Blueprint $table) {
            $table->id();
            
            // kategori, contoh: "Edukasi"
            $table->string('kategori')->default('Edukasi');

            // judul artikel
            $table->string('judul');

            // slug untuk URL /edukasi/{slug}
            $table->string('slug')->unique();

            // nama penulis
            $table->string('penulis')->nullable();

            // tanggal publikasi
            $table->date('tanggal_publikasi')->nullable();

            // estimasi waktu baca, contoh "5 menit baca"
            $table->string('waktu_baca')->nullable();

            // thumbnail / gambar header (path file)
            $table->string('thumbnail')->nullable();

            // paragraf pembuka / intro
            $table->text('intro')->nullable();

            // konten utama (HTML penuh)
            $table->longText('konten');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('edukasi');
    }
};
