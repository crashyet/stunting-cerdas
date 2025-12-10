<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekomendasi_makanan', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->string('kategori'); // contoh: MPASI
    $table->string('usia'); // contoh: 6-12 bulan
    $table->string('porsi'); // contoh: 100-150 gram

    $table->integer('kalori');
    $table->string('protein');
    $table->string('karbo');
    $table->string('lemak');

    $table->json('vitamin'); // array vitamin & mineral
    $table->text('porsi_disarankan');
    $table->text('tips'); // json array tips
    $table->string('emoji')->nullable(); // 🍽️

    $table->string('slug')->unique();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_makanan');
    }
};
