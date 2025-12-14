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
        Schema::create('pengukuran_anak', function (Blueprint $table) {
    $table->id();
    $table->foreignId('anak_id')->constrained('anak')->cascadeOnDelete();
    $table->decimal('tinggi_badan', 5, 2);
    $table->decimal('berat', 5, 2);
    $table->integer('umur'); // bulan
    $table->decimal('z_score', 4, 2)->nullable();
    $table->string('status')->nullable(); // Normal / Stunting / dsb
    $table->date('tanggal_pengukuran');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran_anak');
    }
};
