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
      Schema::create('data_booking', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('jam_antrian_id');
          // $table->unsignedBigInteger('tanggal_antrian_id');
          $table->tinyInteger('status')->default(1);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('jam_antrian_id')->references('id')->on('jam_antrian')->onDelete('cascade');
          // $table->foreign('tanggal_antrian_id')->references('id')->on('tanggal_antrian')->onDelete('cascade');
          $table->timestamps();
          
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_bookings');
    }
};
