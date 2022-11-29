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
        Schema::create('rka', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subunit_id');
            $table->string('no_dokumen');
            $table->date('tanggal_dokumen');
            $table->text('uraian')->nullable();
            $table->string('jenis');
            $table->year('tahun_anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rka');
    }
};
