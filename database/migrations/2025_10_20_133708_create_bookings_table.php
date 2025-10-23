<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->string('desk_number', 10)->nullable(); // A1, A2, dst
            $table->string('booking_code', 50)->unique();

            $table->date('booking_date');
            $table->time('start_time'); // jam awal dari slot terpilih
            $table->time('end_time');   // jam akhir dari slot terakhir (bisa non-contiguous, tapi akhiran ambil slot terakhir)
            $table->text('booked_slots'); // "12:00–13:00,14:00–15:00"

            $table->integer('total_hours');
            $table->decimal('total_price', 10, 2);

            $table->enum('status', ['pending', 'confirmed'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
