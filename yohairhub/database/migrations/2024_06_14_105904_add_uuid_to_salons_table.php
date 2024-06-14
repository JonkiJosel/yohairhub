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
        Schema::table('salons', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->default(\DB::raw('(UUID())'))->comment('Unique public identifier for the salon');
            $table->decimal('rating', 2, 1)->default(0); // Add a rating column
            $table->boolean('is_featured')->default(false); // Add an is_featured column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salons', function (Blueprint $table) {
            $table->dropColumn('uuid'); // Drop the UUID column
            $table->dropColumn('rating'); // Drop the rating column
            $table->dropColumn('is_featured'); // Drop the is_featured column
        });
    }
};
