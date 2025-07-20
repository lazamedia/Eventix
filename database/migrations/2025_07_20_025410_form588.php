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
        Schema::create('form588', function (Blueprint $table) {
            $table->id();
            $table->string('namaEvent');
            $table->string('kategori');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('status');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form588');
    }
};
