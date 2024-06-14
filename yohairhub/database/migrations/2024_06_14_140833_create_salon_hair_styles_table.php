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
        Schema::create('salon_hair_styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salon_id')->constrained()->onDelete('cascade');
            $table->foreignId('hair_style_id')->constrained()->onDelete('cascade');
            $table->decimal('custom_price', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_hair_styles');
    }
};
