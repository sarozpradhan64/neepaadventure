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
        Schema::table('services', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('description');
            $table->decimal('price_from', 10, 2)->nullable()->after('duration');
            $table->enum('difficulty_level', ['easy', 'moderate', 'hard', 'extreme'])->nullable()->after('price_from');
            $table->integer('max_group_size')->nullable()->after('difficulty_level');
            $table->string('best_season')->nullable()->after('max_group_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'duration',
                'price_from',
                'difficulty_level',
                'max_group_size',
                'best_season',
            ]);
        });
    }
};
