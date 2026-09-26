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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'client_name',
                'location',
                'project_type',
                'website_url',
                'start_date',
                'completion_date',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('client_name')->nullable();
            $table->string('location')->nullable();
            $table->string('project_type')->nullable();
            $table->string('website_url', 500)->nullable();
            $table->date('start_date')->nullable();
            $table->date('completion_date')->nullable();
        });
    }
};
