<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_gu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('belanja_rka_pd_id')->nullable();
            $table->string('nomor')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('uraian')->nullable();
            $table->decimal('nilai', 17, 4)->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('status')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->text('npwp')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->text('nomor_rekening')->nullable();
            $table->string('jenis')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_gu');
    }
};
