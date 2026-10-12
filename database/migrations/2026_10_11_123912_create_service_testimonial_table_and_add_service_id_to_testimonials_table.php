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
        if (! Schema::hasColumn('testimonials', 'service_id')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $table->foreignId('service_id')->nullable()->after('user_id')->constrained('services')->nullOnDelete();
            });
        }

        if (! Schema::hasTable('service_testimonial')) {
            Schema::create('service_testimonial', function (Blueprint $table) {
                $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
                $table->foreignId('testimonial_id')->constrained('testimonials')->cascadeOnDelete();
                $table->primary(['service_id', 'testimonial_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_testimonial');

        if (Schema::hasColumn('testimonials', 'service_id')) {
            Schema::table('testimonials', function (Blueprint $table) {
                $table->dropForeign(['service_id']);
                $table->dropColumn('service_id');
            });
        }
    }
};
