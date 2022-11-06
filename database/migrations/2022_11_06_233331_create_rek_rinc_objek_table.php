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
        Schema::create('rek_rinc_objek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rek_objek_id');
            $table->unsignedInteger('kd_rek1');
            $table->unsignedInteger('kd_rek2');
            $table->unsignedInteger('kd_rek3');
            $table->unsignedInteger('kd_rek4');
            $table->unsignedInteger('kd_rek5');
            $table->string('nama');
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
        Schema::dropIfExists('rek_rinc_objek');
    }
};
