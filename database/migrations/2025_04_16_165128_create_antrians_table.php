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
        Schema::create('antrians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pendaftaran_id');
            $table->uuid('dokter_id');
            $table->string('kode_antrian');
            $table->integer('nomor_antrian');
            $table->enum('status', ['menunggu', 'dipanggil', 'lewati', 'selesai', 'batal'])->default('menunggu');
            $table->timestamp('waktu_daftar');
            $table->timestamp('waktu_dipanggil')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();

            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
