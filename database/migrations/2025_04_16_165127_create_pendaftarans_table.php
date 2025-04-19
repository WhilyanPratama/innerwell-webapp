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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pasien_id');
            $table->uuid('poli_id');
            $table->uuid('jadwal_dokter_id');
            $table->date('tanggal_berobat');
            $table->text('keluhan');
            $table->enum('status_validasi', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
            $table->foreign('jadwal_dokter_id')->references('id')->on('jadwal_dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
