<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nip_nik');
            $table->string('nama');
            $table->string('no_hp')->nullable();
            $table->string('alamat');
            $table->string('instansi');
            $table->string('bertemu_dengan');
            $table->text('perihal')->nullable();
            $table->timestamp('tanggal_kunjungan')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamus');
    }
};