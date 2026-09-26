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
            $table->string('start_end_point')->nullable()->after('maximum_altitude');
            $table->string('support_ratio')->nullable()->after('start_end_point');
            $table->string('deposit_requirement')->nullable()->after('support_ratio');
            $table->string('heli_evac_coverage')->nullable()->after('deposit_requirement');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'start_end_point',
                'support_ratio',
                'deposit_requirement',
                'heli_evac_coverage',
            ]);
        });
    }
};
