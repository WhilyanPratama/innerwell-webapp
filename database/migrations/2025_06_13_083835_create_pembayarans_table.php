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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('rekam_medis_details_id');
            $table->string('nama_pasien');
            $table->uuid('poli_id');
            $table->uuid('dokter_id');
            $table->enum('status_pembayaran', ['lunas', 'belum lunas']);
            // untuk invoice
            $table->integer('biaya_dokter');
            $table->integer('biaya_layanan');
            $table->integer('total_biaya');
            $table->timestamps();


            $table->foreign('rekam_medis_details_id')->references('id')->on('rekam_medis_details')->onDelete('cascade');
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
