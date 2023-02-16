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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id');
            $table->string('key')->unique();
            $table->timestamp('tanggal_masuk')->nullable();
            $table->timestamp('tanggal_keluar')->nullable();
            $table->timestamp('tanggal_beres_cuti')->nullable();
            $table->string('lokasi');
            $table->string('ip_address');
            $table->string('status');
            $table->string('keterangan');
            $table->string('tahun');
            $table->string('bulan');
            $table->string('tanggal');
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
        Schema::dropIfExists('absens');
    }
};
