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
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('project_videos');
        Schema::dropIfExists('project_statistics');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
