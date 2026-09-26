<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Blaze\AdminCore\Models\Project::truncate();

        \Blaze\AdminCore\Models\Project::create([
            'title' => 'Russian Alpine Club - Annapurna Base Camp',
            'slug' => 'russian-alpine-club-abc',
            'project_status' => 'completed',
            'is_featured' => 1,
            'sort_order' => 1,
            'short_description' => '12 Members from Moscow & St. Petersburg reached 4,130m ABC with 100% success rate.',
            'description' => 'Detailed description of the Russian Alpine Club trek to Annapurna Base Camp.',
            'duration' => '12 Days',
            'max_altitude' => '4,130m',
            'destination_success' => '100% (12/12)',
            'lead_by' => 'Dawa Sherpa',
            'season' => 'Winter 2024',
            'team_size' => '12 Climbers',
            'nation' => 'Russia',
            'dossier_title' => 'Russian Alpine Club ABC Trek',
            'dossier_description' => 'Complete operational debrief, team roster, satellite track record, and altitude profile.',
            'inclusions' => 'Pre-booked private heated rooms across high camps, customized carbohydrate loading meals.',
            'status' => true,
        ]);

        \Blaze\AdminCore\Models\Project::create([
            'title' => 'Cambridge Alpine Society Manaslu Project',
            'slug' => 'cambridge-alpine-society-manaslu',
            'project_status' => 'completed',
            'is_featured' => 0,
            'sort_order' => 2,
            'short_description' => '8 UK student climbers successfully traversed the 5,106m Larkya La pass in restricted Manaslu.',
            'description' => 'Detailed description of the Cambridge Alpine Society Manaslu Project.',
            'duration' => '18 Days',
            'max_altitude' => '5,106m',
            'destination_success' => '100% (8/8)',
            'lead_by' => 'Pasang Temba',
            'season' => 'Spring 2024',
            'team_size' => '8 Climbers',
            'nation' => 'UK',
            'dossier_title' => 'Cambridge Alpine Society Manaslu Project',
            'dossier_description' => 'Special permits acquired, robust high-altitude logistics provided.',
            'inclusions' => 'Restricted area permits, private basecamp cook team, Sherpa lead.',
            'status' => true,
        ]);

        \Blaze\AdminCore\Models\Project::create([
            'title' => 'Tokyo Trekking Club Island Pass Trek',
            'slug' => 'tokyo-trekking-club-island-pass',
            'project_status' => 'completed',
            'is_featured' => 0,
            'sort_order' => 3,
            'short_description' => '6 Japanese alpinists achieved 100% destination success on Imja Tse 6,189m.',
            'description' => 'Detailed description of the Tokyo Trekking Club Island Pass Trek.',
            'duration' => '16 Days',
            'max_altitude' => '6,189m',
            'destination_success' => '100% (6/6)',
            'lead_by' => 'Nima Gyalzen Sherpa',
            'season' => 'Autumn 2024',
            'team_size' => '6 Alpinists',
            'nation' => 'Japan',
            'dossier_title' => 'Tokyo Trekking Club Island Pass Trek',
            'dossier_description' => 'High altitude mountaineering gear and support supplied by Neepa Adventure.',
            'inclusions' => '1:1 Sherpa guide support, high camp tents, supplemental oxygen available on request.',
            'status' => true,
        ]);
    }
}
