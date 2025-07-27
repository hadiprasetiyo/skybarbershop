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
      Schema::create('data_collection', function (Blueprint $table) {
        $table->id();
        $table->string('nama_model', 45);
        $table->string('harga', 45);
        $table->string('gambar', 100)->nullable(); // file path
        $table->timestamps();
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('data_collection');
    }
};
