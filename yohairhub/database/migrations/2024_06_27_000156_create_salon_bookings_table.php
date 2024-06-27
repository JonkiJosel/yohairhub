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
        Schema::create('salon_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salon_id')->constrained();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->date('reservation_date');
            $table->time('reservation_time')->nullable();
            $table->foreignId('salon_hair_style_id')->nullable()->constrained();
            $table->foreignId('salon_service_id')->nullable()->constrained();
            $table->text('special_requests')->nullable();
            $table->foreignId('salon_user_id')->nullable()->constrained('salon_users')->name('salon_user_id_fk');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_bookings');
    }
};
