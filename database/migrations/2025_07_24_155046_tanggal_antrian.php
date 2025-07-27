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
      Schema::create('tanggal_antrian', function (Blueprint $table) {
        $table->id();
        $table->date('slot_tanggal');
        $table->tinyInteger('status')->default(1);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggal_antrian');
    }
};
