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
        Schema::create('tabel_barber', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barber');
            $table->integer('kuota')->default(6);
            $table->timestamp('kuota_reset')->nullable();
            $table->string('gambar_barber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_barber');
    }
};
