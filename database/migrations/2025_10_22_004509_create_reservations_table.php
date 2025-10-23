<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // 🧾 Informasi reservasi
            $table->timestamp('booked_at')->useCurrent(); // waktu pemesanan
            $table->date('date_use');                     // kapan dipakai
            $table->time('time_slot');                    // jam peminjaman
            $table->string('seat_type');                  // jenis kursi (Individual, Group, VIP)
            $table->string('seat_number');                // nomor kursi (A1, B3, dsb)
            $table->decimal('price', 10, 2)->default(0);  // harga per sesi

            // 💳 Pembayaran
            $table->string('payment_proof')->nullable();  // file bukti transfer
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
