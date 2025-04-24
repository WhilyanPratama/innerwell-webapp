<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekam_medis_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('rekam_medis_id');
            $table->uuid('antrian_id');
            $table->uuid('dokter_id');
            $table->uuid('poli_id');
            $table->date('tanggal_periksa');
            $table->text('keluhan');
            $table->text('diagnosa')->nullable();
            $table->text('obat')->nullable();
            $table->timestamps();

            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onDelete('cascade');
            $table->foreign('antrian_id')->references('id')->on('antrians')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_details');
    }
};
