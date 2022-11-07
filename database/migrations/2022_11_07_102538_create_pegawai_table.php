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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gelar_dpn')->nullable();
            $table->string('gelar_blkg')->nullable();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tmpt_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('status_kepeg');
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
};
