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
        Schema::create('jadwal_dokters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('dokter_id');
            $table->uuid('poli_id');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']);
            $table->enum('sesi', ['pagi', 'siang', 'sore']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->integer('kuota');
            $table->timestamps();

            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_dokters');
    }
};
