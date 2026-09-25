<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceFeature;
use App\Models\ServiceDeparture;
use Carbon\Carbon;

class TrekDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Everest Base Camp & Gokyo Ri Circuit
        $ebc = Service::updateOrCreate([
            'slug' => 'everest-base-camp-gokyo-ri',
        ], [
            'title' => 'Everest Base Camp & Gokyo Ri Lakes Circuit',
            'short_description' => 'A sacred circumnavigation through the high turquoise glacial lakes of Gokyo, over the glaciated Cho La Pass (5,420m), onto the legendary Khumbu Icefall moraine beneath Mt. Everest.',
            'description' => '<p>Experience the ultimate Himalayan adventure...</p>',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '16 Days / 15 Nights',
            'price_from' => 1750,
            'difficulty_level' => 'hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Oct–Dec',
            'maximum_altitude' => '5,420m',
            'start_end_point' => 'Lukla (Tenzing-Hillary)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($350 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>All Khumbu Permits</li><li>Lukla Flights</li></ul>',
            'exclusions' => '<ul><li>International Flights</li></ul>',
        ]);

        // Itinerary for EBC
        $itinerary = [
            [
                'title' => 'Fly to Lukla, trek to Phakding',
                'description' => 'Early morning flight to Lukla and begin trekking.',
                'altitude' => 2610,
                'walking_time' => '3-4 hours',
                'distance' => '8 km',
                'accommodation' => 'Tea House',
                'meals' => 'L, D'
            ],
            [
                'title' => 'Trek to Namche Bazaar',
                'description' => 'Enter Sagarmatha National Park and ascend to Namche.',
                'altitude' => 3440,
                'walking_time' => '5-6 hours',
                'distance' => '11 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D'
            ]
        ];

        foreach ($itinerary as $index => $day) {
            ServiceFeature::updateOrCreate([
                'service_id' => $ebc->id,
                'day_label' => 'Day ' . ($index + 1),
            ], array_merge($day, [
                'sort_order' => $index + 1,
            ]));
        }

        // Departures for EBC
        $departures = [
            ['start' => Carbon::now()->addDays(30), 'end' => Carbon::now()->addDays(46)],
            ['start' => Carbon::now()->addDays(60), 'end' => Carbon::now()->addDays(76)],
        ];

        foreach ($departures as $dep) {
            ServiceDeparture::updateOrCreate([
                'service_id' => $ebc->id,
                'start_date' => $dep['start'],
            ], [
                'end_date' => $dep['end'],
                'seats_total' => 8,
                'seats_booked' => rand(0, 4),
                'status' => 'Available',
            ]);
        }
        
        
        // 2. Annapurna Circuit
        $abc = Service::updateOrCreate([
            'slug' => 'annapurna-circuit',
        ], [
            'title' => 'Annapurna Circuit & Tilicho Lake',
            'short_description' => 'From subtropical rice paddies to the world\'s highest glacial tarn (Tilicho) and the iconic Thorong La high alpine col.',
            'description' => '<p>The classic Annapurna traverse...</p>',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '18 Days / 17 Nights',
            'price_from' => 1590,
            'difficulty_level' => 'hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,416m',
            'start_end_point' => 'Besisahar',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($318 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>ACAP & TIMS Included</li></ul>',
            'exclusions' => '<ul><li>International Flights</li></ul>',
        ]);
        
        ServiceDeparture::updateOrCreate([
            'service_id' => $abc->id,
            'start_date' => Carbon::now()->addDays(20),
        ], [
            'end_date' => Carbon::now()->addDays(38),
            'seats_total' => 8,
            'seats_booked' => 2,
            'status' => 'Available',
        ]);
    }
}
