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
        Schema::create('tabel_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('no_booking')->unique();
            $table->string('no_hp');
            $table->foreignId('layanan_id')->constrained('tabel_layanan');
            $table->foreignId('barber_id')->constrained('tabel_barber')->onDelete('cascade');
            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->enum('status_booking', ['menunggu', 'konfirmasi', 'batal', 'selesai'])->default('menunggu');
            $table->boolean('is_hidden_by_user')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_booking');
    }
};
