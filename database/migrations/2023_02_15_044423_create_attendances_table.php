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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id');
            $table->string('key')->unique();
            $table->string('date');
            $table->string('clock_in');
            $table->string('clock_out')->nullable();
            $table->string('work_duration')->nullable();
            $table->foreignId('location_id');
            $table->string('ip_address');
            $table->foreignId('presence_type_id')->nullable();
            $table->foreignId('arrival_type_id');
            $table->integer('status')->default(0);
            $table->string('year');
            $table->string('month');
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
        Schema::dropIfExists('attendances');
    }
};
