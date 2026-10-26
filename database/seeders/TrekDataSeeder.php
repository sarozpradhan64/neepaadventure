<?php

namespace Database\Seeders;

use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Blaze\AdminCore\Models\ServiceFeature;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TrekDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trekking = ServiceCategory::firstOrCreate(
            ['slug' => 'trekking'],
            [
                'name' => 'Trekking',
                'description' => 'Classic Himalayan circuits, remote passes, and guided alpine treks across Nepal.',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        $everest = ServiceCategory::firstOrCreate(
            ['slug' => 'everest-region'],
            [
                'name' => 'Everest Region',
                'parent_id' => $trekking->id,
                'description' => 'Iconic routes beneath Mount Everest, Sagarmatha National Park, and high Khumbu passes.',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        $annapurna = ServiceCategory::firstOrCreate(
            ['slug' => 'annapurna-region'],
            [
                'name' => 'Annapurna Region',
                'parent_id' => $trekking->id,
                'description' => 'Diverse landscapes, sacred high-altitude lakes, and classic Thorong La circuit.',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        // 1. Everest Base Camp & Gokyo Ri Circuit
        $ebc = Service::updateOrCreate([
            'slug' => 'everest-base-camp-gokyo-ri',
        ], [
            'service_category_id' => $everest->id,
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

        // Full 16-Day Itinerary for EBC & Gokyo Ri Lakes Circuit
        $itinerary = [
            [
                'title' => 'Fly to Lukla, trek to Phakding',
                'description' => 'Early morning flight through the Himalayas to Lukla airstrip (2,860m). Meet the mountain crew and begin a gentle descent through pine-scented Dudh Koshi gorges to Phakding.',
                'altitude' => 2610,
                'walking_time' => '3–4 hours',
                'distance' => '8 km',
                'accommodation' => 'Tea House',
                'meals' => 'L, D',
            ],
            [
                'title' => 'Trek to Namche Bazaar',
                'description' => 'Cross five suspension bridges draped in prayer flags, enter Sagarmatha National Park at Monjo, and make the steep ascent through pine forests to the Sherpa capital.',
                'altitude' => 3440,
                'walking_time' => '5–6 hours',
                'distance' => '11 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Namche Bazaar Acclimatization Hike',
                'description' => 'Essential acclimatization day. Hike to Hotel Everest View (3,880m) for your first panoramic vista of Everest, Lhotse, and Ama Dablam before descending to Namche.',
                'altitude' => 3880,
                'walking_time' => '3–4 hours',
                'distance' => '5 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek to Dole via Mong La',
                'description' => 'Branch off the main EBC highway into the tranquil Gokyo Valley, climbing over the scenic Mong La pass (3,975m) before descending and contouring to Dole.',
                'altitude' => 4110,
                'walking_time' => '5–6 hours',
                'distance' => '12 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek to Machhermo',
                'description' => 'Ascend above the treeline through juniper and alpine scrub. Grand views of Cho Oyu (8,188m) and Kantega flank the Dudh Koshi river below.',
                'altitude' => 4470,
                'walking_time' => '4–5 hours',
                'distance' => '7 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek to Gokyo Lakes (Third Lake)',
                'description' => 'Pass the first two sacred glacial lakes of Gokyo along the lateral moraine of Ngozumpa Glacier, arriving at the turquoise waters of Dudh Pokhari.',
                'altitude' => 4790,
                'walking_time' => '4–5 hours',
                'distance' => '8 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Climb Gokyo Ri & Trek to Thagnak',
                'description' => 'Pre-dawn summit of Gokyo Ri (5,357m) for an incomparable 360-degree amphitheater of four 8,000m giants: Everest, Lhotse, Makalu, and Cho Oyu. Afternoon cross to Thagnak.',
                'altitude' => 5357,
                'walking_time' => '6–7 hours',
                'distance' => '9 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Cross Cho La Pass to Dzongla',
                'description' => 'Alpine start for the technical highlight of the circuit. Traverse rocky scree, ascend the snow-covered Cho La glacier, and cross the prayer-flagged col (5,420m) before descending to Dzongla.',
                'altitude' => 5420,
                'walking_time' => '7–8 hours',
                'distance' => '10 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek to Lobuche',
                'description' => 'A gentle, scenic trek contouring the high slopes above Dughla lake, joining the historic Everest Base Camp trail beneath the towering face of Nuptse.',
                'altitude' => 4940,
                'walking_time' => '3–4 hours',
                'distance' => '7 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Gorak Shep & Everest Base Camp',
                'description' => 'Trek across glacial moraines to Gorak Shep, drop heavy packs, and push onto the legendary Everest Base Camp (5,364m) right beside the tumultuous Khumbu Icefall.',
                'altitude' => 5364,
                'walking_time' => '7–8 hours',
                'distance' => '13 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Sunrise at Kala Patthar, descend to Pheriche',
                'description' => 'Early morning ascent of Kala Patthar (5,545m), the highest viewpoint of Mt. Everest. Descend past the historic Sherpa memorials at Dughla to the medical base at Pheriche.',
                'altitude' => 5545,
                'walking_time' => '7–8 hours',
                'distance' => '15 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek to Namche Bazaar via Tengboche',
                'description' => 'Descend through rhododendron groves to the renowned Tengboche Monastery beneath Ama Dablam, continuing along the panoramic trail back to Namche Bazaar.',
                'altitude' => 3860,
                'walking_time' => '6–7 hours',
                'distance' => '14 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Trek Namche Bazaar to Lukla',
                'description' => 'Final full day on the trail retracing our steps along the Dudh Koshi. Evening celebratory dinner with your Sherpa guides and porters at Lukla.',
                'altitude' => 2860,
                'walking_time' => '6–7 hours',
                'distance' => '19 km',
                'accommodation' => 'Tea House',
                'meals' => 'B, L, D',
            ],
            [
                'title' => 'Fly Lukla to Kathmandu',
                'description' => 'Board the scenic mountain flight back to Kathmandu. Private transfer to your hotel for hot showers, celebration, and relaxation.',
                'altitude' => 1400,
                'walking_time' => '35m flight',
                'distance' => 'Air transfer',
                'accommodation' => 'Hotel',
                'meals' => 'B',
            ],
            [
                'title' => 'Kathmandu Contingency & Exploration Day',
                'description' => 'Essential buffer day against Himalayan weather delays. Enjoy guided sightseeing in historic Patan and Pashupatinath or relax in Thamel.',
                'altitude' => 1400,
                'walking_time' => 'Optional',
                'distance' => 'City tour',
                'accommodation' => 'Hotel',
                'meals' => 'B, D',
            ],
            [
                'title' => 'Final Departure from Nepal',
                'description' => 'Private transfer to Tribhuvan International Airport for your return flight home, taking lifelong memories of the high Khumbu and turquoise lakes.',
                'altitude' => 1400,
                'walking_time' => 'Transfer',
                'distance' => 'Airport',
                'accommodation' => 'Departure',
                'meals' => 'B',
            ],
        ];

        foreach ($itinerary as $index => $day) {
            ServiceFeature::updateOrCreate([
                'service_id' => $ebc->id,
                'day_label' => 'Day '.($index + 1),
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

        // 2. Annapurna Circuit & Tilicho Lake
        $abc = Service::updateOrCreate([
            'slug' => 'annapurna-circuit',
        ], [
            'service_category_id' => $annapurna->id,
            'title' => 'Annapurna Circuit & Tilicho Lake',
            'short_description' => 'From subtropical rice paddies to the world\'s highest glacial tarn (Tilicho) and the iconic Thorong La high alpine col (5,416m).',
            'description' => '<p>The classic Annapurna traverse featuring dramatic elevation shifts from humid valleys to stark trans-Himalayan desert.</p>',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 1590,
            'difficulty_level' => 'hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,416m',
            'start_end_point' => 'Besisahar / Pokhara',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($318 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>ACAP & TIMS Included</li><li>All Lodging & Meals</li></ul>',
            'exclusions' => '<ul><li>International Flights</li></ul>',
        ]);

        $abcItinerary = [
            ['title' => 'Drive Kathmandu to Besisahar & Chamje', 'altitude' => 1410, 'walking_time' => '6–7 hrs drive', 'distance' => '180 km', 'accommodation' => 'Tea House', 'meals' => 'L, D'],
            ['title' => 'Trek Chamje to Dharapani', 'altitude' => 1860, 'walking_time' => '5–6 hrs', 'distance' => '12 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Dharapani to Chame', 'altitude' => 2670, 'walking_time' => '5–6 hrs', 'distance' => '15 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Chame to Pisang', 'altitude' => 3200, 'walking_time' => '5 hrs', 'distance' => '14 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Pisang to Manang via Ghyaru', 'altitude' => 3540, 'walking_time' => '6–7 hrs', 'distance' => '17 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Acclimatization Day at Manang (Gangapurna Lake)', 'altitude' => 3800, 'walking_time' => '3–4 hrs', 'distance' => '6 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Manang to Siri Kharka', 'altitude' => 4060, 'walking_time' => '4–5 hrs', 'distance' => '10 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Siri Kharka to Tilicho Base Camp', 'altitude' => 4150, 'walking_time' => '5 hrs', 'distance' => '9 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Hike to Sacred Tilicho Lake (4,919m), return to Siri Kharka', 'altitude' => 4919, 'walking_time' => '7–8 hrs', 'distance' => '16 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Siri Kharka to Yak Kharka', 'altitude' => 4050, 'walking_time' => '5 hrs', 'distance' => '11 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Trek Yak Kharka to Thorong High Camp', 'altitude' => 4850, 'walking_time' => '4 hrs', 'distance' => '7 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Cross Thorong La Pass (5,416m) to Muktinath', 'altitude' => 5416, 'walking_time' => '8–9 hrs', 'distance' => '16 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Drive Muktinath to Jomsom & Marpha', 'altitude' => 2670, 'walking_time' => '3–4 hrs', 'distance' => '22 km', 'accommodation' => 'Tea House', 'meals' => 'B, L, D'],
            ['title' => 'Morning Flight from Jomsom to Pokhara', 'altitude' => 822, 'walking_time' => '25m flight', 'distance' => 'Air transfer', 'accommodation' => 'Hotel', 'meals' => 'B'],
        ];

        foreach ($abcItinerary as $index => $day) {
            ServiceFeature::updateOrCreate([
                'service_id' => $abc->id,
                'day_label' => 'Day '.($index + 1),
            ], array_merge($day, [
                'sort_order' => $index + 1,
            ]));
        }

        ServiceDeparture::updateOrCreate([
            'service_id' => $abc->id,
            'start_date' => Carbon::now()->addDays(20),
        ], [
            'end_date' => Carbon::now()->addDays(34),
            'seats_total' => 8,
            'seats_booked' => 2,
            'status' => 'Available',
        ]);
    }
}
