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
        Schema::create('form592', function (Blueprint $table) {
            $table->id();
            $table->string('nama_592', 255);
            $table->string('email_592', 255);
            $table->string('telepon_592', 20);
            $table->string('foto_592')->nullable();
            $table->enum('jenis_tiket_592', ['regular', 'vip', 'platinum']);
            $table->unsignedTinyInteger('jumlah_592');
            $table->enum('metode_592', ['transfer', 'ewallet', 'credit']);
            $table->unsignedBigInteger('total_harga');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form592');
    }
};
