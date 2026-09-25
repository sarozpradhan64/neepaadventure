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
        Schema::table('service_features', function (Blueprint $table) {
            $table->string('day_label')->nullable()->after('title');
            $table->string('altitude')->nullable()->after('day_label');
            $table->string('walking_time')->nullable()->after('altitude');
            $table->string('distance')->nullable()->after('walking_time');
            $table->string('accommodation')->nullable()->after('distance');
            $table->string('meals')->nullable()->after('accommodation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_features', function (Blueprint $table) {
            $table->dropColumn([
                'day_label',
                'altitude',
                'walking_time',
                'distance',
                'accommodation',
                'meals',
            ]);
        });
    }
};
