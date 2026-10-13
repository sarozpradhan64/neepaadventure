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
            $table->string('map_image', 500)->nullable()->after('featured_image');
            $table->foreignId('gallery_album_id')->nullable()->after('service_category_id')->constrained('gallery_albums')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['gallery_album_id']);
            $table->dropColumn(['map_image', 'gallery_album_id']);
        });
    }
};
