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
        Schema::table('hair_styles', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->default(\DB::raw('(UUID())'))->comment('Unique public identifier for the hairstyle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hair_styles', function (Blueprint $table) {
            $table->dropColumn('uuid'); // Drop the UUID column
        });
    }
};
