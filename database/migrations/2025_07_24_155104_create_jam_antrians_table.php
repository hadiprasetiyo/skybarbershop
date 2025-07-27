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
      Schema::create('jam_antrian', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('tanggal_antrian_id');
          $table->time('slot_jam');
          $table->tinyInteger('status')->default(1);
          $table->foreign('tanggal_antrian_id')->references('id')->on('tanggal_antrian')->onDelete('cascade');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_antrian');
    }
};
