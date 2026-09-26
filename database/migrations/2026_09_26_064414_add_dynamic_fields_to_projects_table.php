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
            $table->string('duration')->nullable();
            $table->string('max_altitude')->nullable();
            $table->string('destination_success')->nullable();
            $table->string('lead_by')->nullable();
            $table->string('season')->nullable();
            $table->string('team_size')->nullable();
            $table->string('nation')->nullable();
            $table->string('dossier_title')->nullable();
            $table->text('dossier_description')->nullable();
            $table->longText('inclusions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'duration',
                'max_altitude',
                'destination_success',
                'lead_by',
                'season',
                'team_size',
                'nation',
                'dossier_title',
                'dossier_description',
                'inclusions',
            ]);
        });
    }
};
