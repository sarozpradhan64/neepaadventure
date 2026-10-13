<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class NepalServicesSeeder extends Seeder
{
    public function run(): void
    {
        // ═══════════════════════════════════════════
        //  TOP-LEVEL CATEGORIES
        // ═══════════════════════════════════════════

        $trekking = ServiceCategory::firstOrCreate(
            ['slug' => 'trekking'],
            [
                'name' => 'Trekking',
                'description' => 'Classic Himalayan circuits, remote passes, and guided alpine treks across Nepal.',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        $tours = ServiceCategory::firstOrCreate(
            ['slug' => 'tours-experiences'],
            [
                'name' => 'Tours & Experiences',
                'description' => 'Curated cultural tours, wellness retreats, heritage sightseeing, and unique Nepal experiences.',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        $adventures = ServiceCategory::firstOrCreate(
            ['slug' => 'adventures'],
            [
                'name' => 'Adventures',
                'description' => 'Adrenaline-fuelled peak climbing, biking, paragliding, and extreme outdoor adventures.',
                'status' => true,
                'sort_order' => 3,
            ]
        );

        // ═══════════════════════════════════════════
        //  TREKKING SUB-CATEGORIES (Duration-based)
        // ═══════════════════════════════════════════

        $oneWeek = ServiceCategory::firstOrCreate(
            ['slug' => 'one-week-treks'],
            [
                'name' => 'One Week Treks',
                'parent_id' => $trekking->id,
                'description' => 'Perfect 7–9 day Himalayan treks ideal for those with limited time but big ambitions.',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        $twoWeeks = ServiceCategory::firstOrCreate(
            ['slug' => 'two-week-treks'],
            [
                'name' => 'Two Week Treks',
                'parent_id' => $trekking->id,
                'description' => 'Iconic 14–18 day circuits covering the great Himalayan passes and base camps.',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        $remote = ServiceCategory::firstOrCreate(
            ['slug' => 'remote-unexplored-treks'],
            [
                'name' => 'Remote & Unexplored Treks',
                'parent_id' => $trekking->id,
                'description' => 'Off-the-beaten-path expeditions to Nepal\'s most isolated valleys and hidden lakes.',
                'status' => true,
                'sort_order' => 3,
            ]
        );

        $camping = ServiceCategory::firstOrCreate(
            ['slug' => 'wilderness-camping'],
            [
                'name' => 'Wilderness Camping',
                'parent_id' => $trekking->id,
                'description' => 'Self-sufficient off-grid camping expeditions through Nepal\'s most dramatic terrain.',
                'status' => true,
                'sort_order' => 4,
            ]
        );

        // ═══════════════════════════════════════════
        //  TREKKING SUB-CATEGORIES (Regional)
        // ═══════════════════════════════════════════

        $everest = ServiceCategory::firstOrCreate(
            ['slug' => 'everest-region'],
            [
                'name' => 'Everest Region',
                'parent_id' => $trekking->id,
                'description' => 'Iconic routes beneath Mount Everest, Sagarmatha National Park, and high Khumbu passes.',
                'status' => true,
                'sort_order' => 5,
            ]
        );

        $annapurna = ServiceCategory::firstOrCreate(
            ['slug' => 'annapurna-region'],
            [
                'name' => 'Annapurna Region',
                'parent_id' => $trekking->id,
                'description' => 'Diverse landscapes, sacred high-altitude lakes, and the classic Thorong La circuit.',
                'status' => true,
                'sort_order' => 6,
            ]
        );

        $manaslu = ServiceCategory::firstOrCreate(
            ['slug' => 'manaslu-region'],
            [
                'name' => 'Manaslu Region',
                'parent_id' => $trekking->id,
                'description' => 'Remote circuit around the world\'s eighth-highest peak and the hidden Tsum Valley.',
                'status' => true,
                'sort_order' => 7,
            ]
        );

        $langtang = ServiceCategory::firstOrCreate(
            ['slug' => 'langtang-region'],
            [
                'name' => 'Langtang Region',
                'parent_id' => $trekking->id,
                'description' => 'Nepal\'s nearest high mountain region from Kathmandu, with glaciers, lakes, and Tamang villages.',
                'status' => true,
                'sort_order' => 8,
            ]
        );

        $rolwaling = ServiceCategory::firstOrCreate(
            ['slug' => 'rolwaling-region'],
            [
                'name' => 'Rolwaling Region',
                'parent_id' => $trekking->id,
                'description' => 'Glaciated high-altitude valleys, turquoise lakes, and the legendary Tashi Lapcha Pass.',
                'status' => true,
                'sort_order' => 9,
            ]
        );

        $mustang = ServiceCategory::firstOrCreate(
            ['slug' => 'mustang-region'],
            [
                'name' => 'Mustang Region',
                'parent_id' => $trekking->id,
                'description' => 'Ancient Tibetan kingdom, dramatic desert canyon landscapes, and Lo Manthang\'s medieval culture.',
                'status' => true,
                'sort_order' => 10,
            ]
        );

        $western = ServiceCategory::firstOrCreate(
            ['slug' => 'western-region'],
            [
                'name' => 'Western Region',
                'parent_id' => $trekking->id,
                'description' => 'Nepal\'s wildest frontier: Dolpo, Rara, Limi Valley, and remote pilgrimage trails.',
                'status' => true,
                'sort_order' => 11,
            ]
        );

        $eastern = ServiceCategory::firstOrCreate(
            ['slug' => 'eastern-region'],
            [
                'name' => 'Eastern Region',
                'parent_id' => $trekking->id,
                'description' => 'Makalu massif, Mundhum trail, and the ancient pilgrimage site of Pathibhara.',
                'status' => true,
                'sort_order' => 12,
            ]
        );

        // ═══════════════════════════════════════════
        //  TOURS & EXPERIENCES SUB-CATEGORIES
        // ═══════════════════════════════════════════

        $toursSubcats = [
            ['slug' => 'yoga-retreat',            'name' => 'Yoga & Retreat',              'sort_order' => 1],
            ['slug' => 'sound-healing',           'name' => 'Sound Healing',               'sort_order' => 2],
            ['slug' => 'hiking',                  'name' => 'Hiking',                      'sort_order' => 3],
            ['slug' => 'festivals',               'name' => 'Festivals',                   'sort_order' => 4],
            ['slug' => 'cultural-programs',       'name' => 'Cultural Programs',           'sort_order' => 5],
            ['slug' => 'local-food-hunt',         'name' => 'Local Food Hunt',             'sort_order' => 6],
            ['slug' => 'unesco-heritage',         'name' => 'UNESCO Heritage Sightseeing', 'sort_order' => 7],
            ['slug' => 'chitwan-tour',            'name' => 'Chitwan',                     'sort_order' => 8],
            ['slug' => 'pokhara-tour',            'name' => 'Pokhara',                     'sort_order' => 9],
            ['slug' => 'bike-tours',              'name' => 'Bike Tours',                  'sort_order' => 10],
            ['slug' => 'heli-tours',              'name' => 'Heli Tours',                  'sort_order' => 11],
            ['slug' => 'nagarkot-tour',           'name' => 'Nagarkot',                    'sort_order' => 12],
            ['slug' => 'chandragiri-tour',        'name' => 'Chandragiri',                 'sort_order' => 13],
            ['slug' => 'kulekhani-chitlang-tour', 'name' => 'Kulekhani Chitlang',          'sort_order' => 14],
        ];

        $toursSubcatModels = [];

        foreach ($toursSubcats as $sub) {
            $toursSubcatModels[$sub['slug']] = ServiceCategory::firstOrCreate(
                ['slug' => $sub['slug']],
                [
                    'name' => $sub['name'],
                    'parent_id' => $tours->id,
                    'status' => true,
                    'sort_order' => $sub['sort_order'],
                ]
            );
        }

        // ═══════════════════════════════════════════
        //  ADVENTURES SUB-CATEGORIES
        // ═══════════════════════════════════════════

        $adventureSubcats = [
            ['slug' => 'peak-climbing',     'name' => 'Peak Climbing',      'sort_order' => 1],
            ['slug' => 'mountain-biking',   'name' => 'Mountain Biking',    'sort_order' => 2],
            ['slug' => 'paragliding',       'name' => 'Paragliding',        'sort_order' => 3],
            ['slug' => 'bungee-jumping',    'name' => 'Bungee Jumping',     'sort_order' => 4],
            ['slug' => 'ultralight-flight', 'name' => 'Ultralight',         'sort_order' => 5],
            ['slug' => 'hot-air-balloon',   'name' => 'Hot Air Balloon',    'sort_order' => 6],
            ['slug' => 'jungle-safari',     'name' => 'Jungle Safari',      'sort_order' => 7],
            ['slug' => 'birdwatching',      'name' => 'Birdwatching',       'sort_order' => 8],
            ['slug' => 'rock-climbing',     'name' => 'Rock Climbing',      'sort_order' => 9],
            ['slug' => 'ice-climbing',      'name' => 'Ice Climbing',       'sort_order' => 10],
            ['slug' => 'zipline',           'name' => 'Zipline',            'sort_order' => 11],
            ['slug' => 'canyoning',         'name' => 'Canyoning',          'sort_order' => 12],
            ['slug' => 'kayaking-paddling', 'name' => 'Kayaking & Paddling', 'sort_order' => 13],
            ['slug' => 'skydiving',         'name' => 'Skydiving',          'sort_order' => 14],
        ];

        $adventureSubcatModels = [];

        foreach ($adventureSubcats as $sub) {
            $adventureSubcatModels[$sub['slug']] = ServiceCategory::firstOrCreate(
                ['slug' => $sub['slug']],
                [
                    'name' => $sub['name'],
                    'parent_id' => $adventures->id,
                    'status' => true,
                    'sort_order' => $sub['sort_order'],
                ]
            );
        }

        // ═══════════════════════════════════════════
        //  HELPER
        // ═══════════════════════════════════════════

        /**
         * @param  array<string, mixed>  $data
         */
        $upsert = function (array $data): Service {
            $data += ['description' => ''];

            return Service::updateOrCreate(
                ['slug' => $data['slug']],
                $data,
            );
        };

        // ═══════════════════════════════════════════
        //  EVEREST REGION TREKS
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'everest-base-camp',
            'service_category_id' => $everest->id,
            'title' => 'Everest Base Camp Trek',
            'short_description' => 'The world\'s most iconic trek — through the Khumbu Valley to the foot of Mount Everest at 5,364m.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 1450,
            'difficulty_level' => 'Hard',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Oct–Dec',
            'maximum_altitude' => '5,364m',
            'start_end_point' => 'Lukla (Tenzing-Hillary Airport)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($290 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>All Khumbu Permits (TIMS, SAARC, NP)</li><li>Lukla Flights (KTM–Lukla–KTM)</li><li>Tea House Accommodation</li><li>All Meals on Trek</li><li>Experienced Licensed Guide</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'ebc-three-high-passes',
            'service_category_id' => $everest->id,
            'title' => 'Everest Three High Passes Trek',
            'short_description' => 'Cross the legendary Kongma La (5,535m), Cho La (5,420m), and Renjo La (5,360m) in a single epic circuit.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '20 Days / 19 Nights',
            'price_from' => 1950,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Oct–Nov',
            'maximum_altitude' => '5,535m',
            'start_end_point' => 'Lukla (Tenzing-Hillary Airport)',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '20% ($390 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>All Khumbu Permits</li><li>Lukla Flights</li><li>All Meals & Accommodation</li><li>Expert High-Altitude Guide</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'ebc-gokyo-lakes',
            'service_category_id' => $everest->id,
            'title' => 'EBC & Gokyo Lakes Trek',
            'short_description' => 'Combine EBC with the turquoise Gokyo Lakes and panoramic Gokyo Ri summit (5,357m) via the Cho La Pass.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '18 Days / 17 Nights',
            'price_from' => 1750,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Oct–Dec',
            'maximum_altitude' => '5,420m',
            'start_end_point' => 'Lukla (Tenzing-Hillary Airport)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($350 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>All Khumbu Permits</li><li>Lukla Flights</li><li>All Meals & Tea House Accommodation</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'pikeypeak-dudhkunda',
            'service_category_id' => $everest->id,
            'title' => 'Pikey Peak & Dudhkunda Lake Trek',
            'short_description' => 'A hidden gem with one of the finest 360° Himalayan panoramas and the sacred Dudhkunda glacier lake.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 4,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 790,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Dec',
            'maximum_altitude' => '4,830m',
            'start_end_point' => 'Salleri / Phaplu',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($158 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  ANNAPURNA REGION TREKS
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'annapurna-circuit-tilicho',
            'service_category_id' => $annapurna->id,
            'title' => 'Annapurna Circuit & Tilicho Lake',
            'short_description' => 'From subtropical rice paddies to the world\'s highest glacial tarn (Tilicho, 4,919m) and the iconic Thorong La (5,416m).',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '18 Days / 17 Nights',
            'price_from' => 1590,
            'difficulty_level' => 'Hard',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,416m',
            'start_end_point' => 'Besisahar / Pokhara',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($318 USD)',
            'heli_evac_coverage' => 'Mandatory / Monitored',
            'inclusions' => '<ul><li>ACAP & TIMS Permits</li><li>All Meals & Tea House Accommodation</li><li>Certified Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'annapurna-base-camp',
            'service_category_id' => $annapurna->id,
            'title' => 'Annapurna Base Camp Trek (ABC)',
            'short_description' => 'Walk deep into the Annapurna Sanctuary — a natural amphitheatre ringed by 7,000m and 8,000m peaks.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 2,
            'duration' => '12 Days / 11 Nights',
            'price_from' => 1090,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,130m',
            'start_end_point' => 'Pokhara / Nayapul',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($218 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>ACAP & TIMS Permits</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'north-annapurna-base-camp',
            'service_category_id' => $annapurna->id,
            'title' => 'North Annapurna Base Camp Trek',
            'short_description' => 'A spectacular off-trail route approaching Annapurna from the north through Nar and Phu hidden valleys.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 890,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,200m',
            'start_end_point' => 'Pokhara',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($178 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'ghorepani-poonhill',
            'service_category_id' => $annapurna->id,
            'title' => 'Ghorepani Poon Hill Trek',
            'short_description' => 'Nepal\'s most popular short trek — sunrise from Poon Hill (3,210m) frames Dhaulagiri, Annapurna, and Machhapuchhre in gold.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 4,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 590,
            'difficulty_level' => 'Easy',
            'max_group_size' => 15,
            'best_season' => 'Year-round (best Oct–May)',
            'maximum_altitude' => '3,210m',
            'start_end_point' => 'Pokhara / Nayapul',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($118 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>ACAP & TIMS Permits</li><li>All Meals & Tea House Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'mardi-himal-trek',
            'service_category_id' => $annapurna->id,
            'title' => 'Mardi Himal Trek',
            'short_description' => 'A rewarding off-the-beaten-path route to the high camp below Mardi Himal (5,587m) with close-up Machapuchare views.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 5,
            'duration' => '8 Days / 7 Nights',
            'price_from' => 690,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,500m',
            'start_end_point' => 'Pokhara',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($138 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>ACAP & TIMS Permits</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'kapuche-lake-kori',
            'service_category_id' => $annapurna->id,
            'title' => 'Kapuche Lake & Kori Trek',
            'short_description' => 'Trek to the lowest glacial lake in Nepal (Kapuche, 2,548m) nestled beneath towering Annapurna cliffs.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 6,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 620,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '2,548m',
            'start_end_point' => 'Pokhara',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($124 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>ACAP Permit</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'narphu-valley-trek',
            'service_category_id' => $annapurna->id,
            'title' => 'Narphu Valley Trek',
            'short_description' => 'One of Nepal\'s most restricted and remote valleys — a Tibetan cultural gem hidden above the Nar Phu gorge.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 7,
            'duration' => '16 Days / 15 Nights',
            'price_from' => 2200,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Apr–Jun & Sep–Oct',
            'maximum_altitude' => '5,320m',
            'start_end_point' => 'Besisahar / Koto',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($660 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Restricted Area Permits (Nar Phu)</li><li>All Meals & Camping/Lodge</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  MANASLU REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'manaslu-circuit-trek',
            'service_category_id' => $manaslu->id,
            'title' => 'Manaslu Circuit Trek',
            'short_description' => 'Nepal\'s most dramatic and restricted circuit — circumnavigating the world\'s eighth-highest peak via the Larkya La Pass (5,160m).',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '16 Days / 15 Nights',
            'price_from' => 1690,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,160m',
            'start_end_point' => 'Soti Khola / Besisahar',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($338 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Restricted Area Permit & MCAP</li><li>All Meals & Tea House / Camping</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'tsum-valley-trek',
            'service_category_id' => $manaslu->id,
            'title' => 'Tsum Valley Trek',
            'short_description' => 'A sacred Himalayan pilgrimage valley with ancient monasteries, untouched Tibetan culture, and dramatic peaks.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '18 Days / 17 Nights',
            'price_from' => 1850,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,780m',
            'start_end_point' => 'Machha Khola / Arughat',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($370 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Tsum Valley Restricted Permit & MCAP</li><li>All Meals & Lodge Accommodation</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  LANGTANG REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'langtang-valley-trek',
            'service_category_id' => $langtang->id,
            'title' => 'Langtang Valley Trek',
            'short_description' => 'Nepal\'s nearest high-mountain valley from Kathmandu — glaciers, yak pastures, and the sacred Kyanjin Gompa.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 750,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,773m',
            'start_end_point' => 'Syabrubesi',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($150 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>LTBR & TIMS Permits</li><li>All Meals & Tea House Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'gosaikunda-lake-trek',
            'service_category_id' => $langtang->id,
            'title' => 'Gosaikunda Lake Trek',
            'short_description' => 'Sacred alpine lake at 4,380m — a Hindu and Buddhist pilgrimage site set among dramatic glaciated peaks.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '8 Days / 7 Nights',
            'price_from' => 680,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,380m',
            'start_end_point' => 'Syabrubesi / Dhunche',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($136 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>LTBR & TIMS Permits</li><li>All Meals & Accommodation</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'tamang-heritage-trail',
            'service_category_id' => $langtang->id,
            'title' => 'Tamang Heritage Trail',
            'short_description' => 'Explore traditional Tamang villages, ancient monasteries, and panoramic Himalayan views on a culturally rich circuit.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '8 Days / 7 Nights',
            'price_from' => 650,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Year-round (best Mar–May & Sep–Nov)',
            'maximum_altitude' => '3,870m',
            'start_end_point' => 'Syabrubesi',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($130 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>LTBR & TIMS Permits</li><li>All Meals & Home-Stay / Lodge</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'paanchpokhari-lake-trek',
            'service_category_id' => $langtang->id,
            'title' => 'Paanchpokhari Lake Trek',
            'short_description' => 'Five sacred glacial lakes nestled at 4,100m in the Sindhupalchowk district — one of Nepal\'s best-kept secrets.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 4,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 720,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,100m',
            'start_end_point' => 'Kathmandu / Sindhupalchowk',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($144 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Camp / Lodge</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'helambu-circuit-trek',
            'service_category_id' => $langtang->id,
            'title' => 'Helambu Circuit Trek',
            'short_description' => 'A rewarding loop through Sherpa and Tamang villages in the scenic Helambu hills north of Kathmandu.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 5,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 590,
            'difficulty_level' => 'Easy',
            'max_group_size' => 15,
            'best_season' => 'Year-round',
            'maximum_altitude' => '3,640m',
            'start_end_point' => 'Sundarijal / Melamchi',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($118 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>TIMS Permit</li><li>All Meals & Tea House</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  ROLWALING REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'tsho-rolpa-dudhkunda',
            'service_category_id' => $rolwaling->id,
            'title' => 'Tsho Rolpa Lake & Dudhkunda Trek',
            'short_description' => 'Trek to two stunning glacial lakes — the iconic blue Tsho Rolpa (4,580m) in the dramatic Rolwaling Valley.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 850,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,580m',
            'start_end_point' => 'Dolakha / Simigaun',
            'support_ratio' => '1 Guide:5 & 1 Porter:2',
            'deposit_requirement' => '20% ($170 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Lodge/Camp</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'tashi-lapcha-pass-trek',
            'service_category_id' => $rolwaling->id,
            'title' => 'Tashi Lapcha Pass Trek',
            'short_description' => 'A glacier high-pass crossing (5,755m) connecting the Rolwaling Valley to the Khumbu — for experienced alpinists only.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '18 Days / 17 Nights',
            'price_from' => 2400,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 6,
            'best_season' => 'Apr–May & Sep–Oct',
            'maximum_altitude' => '5,755m',
            'start_end_point' => 'Dolakha / Namche',
            'support_ratio' => '1 Guide:2 & 1 Porter:2',
            'deposit_requirement' => '30% ($720 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>All Permits & NP Fees</li><li>Camping Equipment & Meals</li><li>Expert Alpine Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li><li>Personal Climbing Gear</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  MUSTANG REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'upper-mustang-trek',
            'service_category_id' => $mustang->id,
            'title' => 'Upper Mustang Trek',
            'short_description' => 'Journey into the forbidden kingdom of Lo — ancient cave monasteries, medieval capital Lo Manthang, and Tibet-like desert plateaus.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 2990,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Apr–Nov (Rain-shadow — good in monsoon)',
            'maximum_altitude' => '4,000m',
            'start_end_point' => 'Jomsom (fly from Pokhara)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '30% ($897 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>Upper Mustang Restricted Area Permit ($500)</li><li>ACAP Permit</li><li>All Meals & Lodge Accommodation</li><li>Jomsom Flights</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  WESTERN REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'upper-dolpo-circuit',
            'service_category_id' => $western->id,
            'title' => 'Upper Dolpo Circuit Trek',
            'short_description' => 'Nepal\'s most remote and pristine trekking region — across the Tibetan plateau to the sacred Shey Monastery and crystal mountain.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '24 Days / 23 Nights',
            'price_from' => 3200,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 6,
            'best_season' => 'May–Jun & Sep–Oct',
            'maximum_altitude' => '5,360m',
            'start_end_point' => 'Juphal (fly from Nepalgunj)',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($960 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Upper Dolpo Restricted Permit ($500 for 10 days)</li><li>Shey Phoksundo NP Fee</li><li>Full Camping with Cook & Equipment</li><li>Expert Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International & Domestic Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'shey-phoksundo-lake-trek',
            'service_category_id' => $western->id,
            'title' => 'Shey Phoksundo Lake Trek (Lower Dolpo)',
            'short_description' => 'Trek to Nepal\'s deepest and most mesmerising lake (Phoksundo, 3,611m) — a turquoise jewel in a stark Tibetan landscape.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 1890,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Mar–Jun & Sep–Nov',
            'maximum_altitude' => '3,611m',
            'start_end_point' => 'Juphal (fly from Nepalgunj)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($378 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>Shey Phoksundo NP & ACAP Permits</li><li>All Meals & Camping/Lodge</li><li>Licensed Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International & Domestic Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'rara-lake-trek',
            'service_category_id' => $western->id,
            'title' => 'Rara Lake Trek',
            'short_description' => 'Nepal\'s largest lake (Rara, 2,990m) — remote, pristine, and ringed by snow-capped Mugu peaks and dense pine forests.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '12 Days / 11 Nights',
            'price_from' => 1650,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '3,611m',
            'start_end_point' => 'Talcha Airport (fly from Nepalgunj)',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($330 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>Rara NP Permit</li><li>All Meals & Camping/Lodge</li><li>Guide & Porter</li><li>Domestic Flights</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'limi-valley-trek',
            'service_category_id' => $western->id,
            'title' => 'Limi Valley Trek',
            'short_description' => 'One of Nepal\'s last truly unexplored frontiers — three remote Tibetan-Buddhist villages on the China border in Humla.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 4,
            'duration' => '22 Days / 21 Nights',
            'price_from' => 2800,
            'difficulty_level' => 'Hard',
            'max_group_size' => 6,
            'best_season' => 'May–Jun & Sep–Oct',
            'maximum_altitude' => '5,200m',
            'start_end_point' => 'Simikot (fly from Nepalgunj)',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($840 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Humla Restricted Area Permit</li><li>Full Camping with Cook</li><li>Licensed Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International & Domestic Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  EASTERN REGION
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'makalu-base-camp-trek',
            'service_category_id' => $eastern->id,
            'title' => 'Makalu Base Camp Trek',
            'short_description' => 'A challenging expedition to the base of the world\'s fifth-highest peak, through the magnificent Barun Valley.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '22 Days / 21 Nights',
            'price_from' => 2100,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 6,
            'best_season' => 'Mar–May & Sep–Oct',
            'maximum_altitude' => '5,700m',
            'start_end_point' => 'Tumlingtar (fly from Kathmandu)',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($630 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Makalu Barun NP Permit</li><li>Full Camping & Meals</li><li>Expert High-Altitude Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International & Domestic Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'mundhum-trail-trek',
            'service_category_id' => $eastern->id,
            'title' => 'Mundhum Trail Trek',
            'short_description' => 'Follow the ancient Kirat oral scripture trail through the Khotang and Solukhumbu hills — a cultural journey like no other.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 1250,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '3,636m',
            'start_end_point' => 'Diktel / Khotang',
            'support_ratio' => '1 Guide:5 & 1 Porter:2',
            'deposit_requirement' => '20% ($250 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Home-Stay / Lodge</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'pathibhara-temple-trek',
            'service_category_id' => $eastern->id,
            'title' => 'Pathibhara Temple Trek',
            'short_description' => 'A spiritual pilgrimage to the revered Pathibhara Devi temple (3,794m) with sweeping views of Kanchenjunga and eastern Himalaya.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 680,
            'difficulty_level' => 'Easy',
            'max_group_size' => 15,
            'best_season' => 'Year-round',
            'maximum_altitude' => '3,794m',
            'start_end_point' => 'Taplejung',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($136 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Tea House</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  REMOTE & UNEXPLORED + WILDERNESS CAMPING
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'kanchenjunga-base-camp-trek',
            'service_category_id' => $remote->id,
            'title' => 'Kanchenjunga Base Camp Trek',
            'short_description' => 'Double base camp circuit around the world\'s third-highest peak — one of Nepal\'s most dramatic and least-trekked routes.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '21 Days / 20 Nights',
            'price_from' => 2350,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 6,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,143m',
            'start_end_point' => 'Taplejung (fly from Kathmandu)',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($705 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Kanchenjunga Conservation Area Permit</li><li>Full Camping & Meals</li><li>Expert Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International & Domestic Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'ruby-valley-trek',
            'service_category_id' => $remote->id,
            'title' => 'Ruby Valley Trek',
            'short_description' => 'Named after the rubies found in the Ganesh Himal foothills — a pristine, crowd-free route through Gurung villages and dense rhododendron forests.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '9 Days / 8 Nights',
            'price_from' => 790,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 10,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,537m',
            'start_end_point' => 'Trishuli / Beshisahar',
            'support_ratio' => '1 Guide:6 & 1 Porter:2',
            'deposit_requirement' => '20% ($158 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Home-Stay / Lodge</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'ama-yangri-peak-trek',
            'service_category_id' => $remote->id,
            'title' => 'Ama Yangri Peak Trek',
            'short_description' => 'A short, thrilling summit to Ama Yangri (3,771m) above the Helambu hills — perfect panoramic views, low traffic.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 590,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Year-round',
            'maximum_altitude' => '3,771m',
            'start_end_point' => 'Melamchi',
            'support_ratio' => '1 Guide:8 & 1 Porter:2',
            'deposit_requirement' => '20% ($118 USD)',
            'heli_evac_coverage' => 'Optional',
            'inclusions' => '<ul><li>All Permits</li><li>All Meals & Home-Stay</li><li>Guide & Porter</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'dhaulagiri-circuit-camping',
            'service_category_id' => $camping->id,
            'title' => 'Dhaulagiri Circuit Wilderness Camp',
            'short_description' => 'A full self-supported camping circuit around Dhaulagiri (8,167m) — one of the most technical trekking routes in the Himalayas.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '22 Days / 21 Nights',
            'price_from' => 2800,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 6,
            'best_season' => 'Apr–May & Sep–Oct',
            'maximum_altitude' => '5,360m',
            'start_end_point' => 'Beni / Pokhara',
            'support_ratio' => '1 Guide:3 & 1 Porter:2',
            'deposit_requirement' => '30% ($840 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>All Permits & NP Fees</li><li>Full Camping Kit, Cook & Meals</li><li>Expert High-Altitude Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li><li>Personal Gear</li></ul>',
        ]);

        $upsert([
            'slug' => 'jugal-himal-basecamp-camping',
            'service_category_id' => $camping->id,
            'title' => 'Jugal Himal Base Camp Wilderness Camp',
            'short_description' => 'A pristine off-grid camping expedition to the remote Jugal Himal base camp through pine forests and glacial moraines.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '10 Days / 9 Nights',
            'price_from' => 1100,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Apr–May & Sep–Nov',
            'maximum_altitude' => '4,800m',
            'start_end_point' => 'Chautara / Sindhupalchowk',
            'support_ratio' => '1 Guide:4 & 1 Porter:2',
            'deposit_requirement' => '20% ($220 USD)',
            'heli_evac_coverage' => 'Recommended',
            'inclusions' => '<ul><li>All Permits</li><li>Full Camping Kit, Cook & Meals</li><li>Guide & Porters</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  TOURS & EXPERIENCES SERVICES
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'kathmandu-yoga-retreat',
            'service_category_id' => $toursSubcatModels['yoga-retreat']->id,
            'title' => 'Kathmandu Yoga & Himalayan Retreat',
            'short_description' => 'A transformative 7-day yoga and meditation retreat in a serene Kathmandu valley ashram with daily Himalayan sunrise sessions.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '7 Days / 6 Nights',
            'price_from' => 850,
            'difficulty_level' => 'Easy',
            'max_group_size' => 10,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,400m',
            'start_end_point' => 'Kathmandu',
            'inclusions' => '<ul><li>Accommodation in Retreat Centre</li><li>Twice-daily Yoga & Meditation</li><li>Vegetarian Meals Included</li><li>Guided Stupa Walk</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'tibetan-singing-bowl-healing',
            'service_category_id' => $toursSubcatModels['sound-healing']->id,
            'title' => 'Tibetan Singing Bowl Sound Healing',
            'short_description' => 'Immersive sound bath sessions using authentic hand-hammered Tibetan singing bowls in a Patan courtyard.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '3 Days / 2 Nights',
            'price_from' => 290,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,350m',
            'start_end_point' => 'Patan / Kathmandu',
            'inclusions' => '<ul><li>3 Full Sound Healing Sessions</li><li>Bowl Making Demonstration</li><li>Herbal Tea & Snacks</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Accommodation</li></ul>',
        ]);

        $upsert([
            'slug' => 'nagarkot-sunrise-hike',
            'service_category_id' => $toursSubcatModels['hiking']->id,
            'title' => 'Nagarkot Sunrise Hike',
            'short_description' => 'A gentle sunrise hike to Nagarkot (2,195m) with sweeping views of 8 of the world\'s 14 highest peaks.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '2 Days / 1 Night',
            'price_from' => 150,
            'difficulty_level' => 'Easy',
            'max_group_size' => 20,
            'best_season' => 'Year-round',
            'maximum_altitude' => '2,195m',
            'start_end_point' => 'Kathmandu / Nagarkot',
            'inclusions' => '<ul><li>Transport from Kathmandu</li><li>Sunrise Guided Walk</li><li>Tea House Breakfast</li></ul>',
            'exclusions' => '<ul><li>Accommodation (optional add-on)</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'indra-jatra-festival-tour',
            'service_category_id' => $toursSubcatModels['festivals']->id,
            'title' => 'Indra Jatra & Living Goddess Festival',
            'short_description' => 'Witness Kathmandu\'s most spectacular street festival — living goddess Kumari procession, masked dances, and ancient ritual performances.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '3 Days / 2 Nights',
            'price_from' => 320,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Sep (Bhadra/Ashwin)',
            'maximum_altitude' => '1,350m',
            'start_end_point' => 'Kathmandu',
            'inclusions' => '<ul><li>Expert Cultural Guide</li><li>Hanuman Dhoka Palace Access</li><li>Newari Feast Dinner</li><li>Heritage Hotel Stay</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'kathmandu-cultural-program',
            'service_category_id' => $toursSubcatModels['cultural-programs']->id,
            'title' => 'Kathmandu Cultural Evening',
            'short_description' => 'An immersive cultural evening with traditional Newari music, classical Nepali dance, and a cultural dinner experience.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 85,
            'difficulty_level' => 'Easy',
            'max_group_size' => 20,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,350m',
            'start_end_point' => 'Kathmandu',
            'inclusions' => '<ul><li>Cultural Dance Performance</li><li>Traditional Newari Set Dinner</li><li>Local Expert Host</li></ul>',
            'exclusions' => '<ul><li>Transport</li><li>Personal Drinks</li></ul>',
        ]);

        $upsert([
            'slug' => 'kathmandu-food-hunt-tour',
            'service_category_id' => $toursSubcatModels['local-food-hunt']->id,
            'title' => 'Kathmandu Local Food Hunt',
            'short_description' => 'A guided street food crawl through Kathmandu\'s old Newari bazaars — bara, yomari, chatamari, sel roti, and butter tea.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 65,
            'difficulty_level' => 'Easy',
            'max_group_size' => 8,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,350m',
            'start_end_point' => 'Kathmandu (Asan Bazaar)',
            'inclusions' => '<ul><li>All Food Tastings (8+ items)</li><li>Expert Food Guide</li><li>Tea House Visit</li></ul>',
            'exclusions' => '<ul><li>Transport</li><li>Additional Purchases</li></ul>',
        ]);

        $upsert([
            'slug' => 'kathmandu-world-heritage-tour',
            'service_category_id' => $toursSubcatModels['unesco-heritage']->id,
            'title' => 'Kathmandu Valley UNESCO Heritage Tour',
            'short_description' => 'All 7 UNESCO World Heritage Sites in a single day — Pashupatinath, Boudhanath, Swayambhunath, and the three Durbar Squares.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '2 Days / 1 Night',
            'price_from' => 185,
            'difficulty_level' => 'Easy',
            'max_group_size' => 15,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,400m',
            'start_end_point' => 'Kathmandu',
            'inclusions' => '<ul><li>All UNESCO Site Entry Fees</li><li>Expert Heritage Guide</li><li>Comfortable Transport</li><li>Traditional Lunch</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'chitwan-jungle-safari-tour',
            'service_category_id' => $toursSubcatModels['chitwan-tour']->id,
            'title' => 'Chitwan National Park Safari Tour',
            'short_description' => 'A classic 3-day jungle safari in Chitwan — elephant-back wildlife viewing, rhino encounters, bird watching, and Tharu cultural shows.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '3 Days / 2 Nights',
            'price_from' => 320,
            'difficulty_level' => 'Easy',
            'max_group_size' => 12,
            'best_season' => 'Oct–May',
            'maximum_altitude' => '150m',
            'start_end_point' => 'Sauraha / Chitwan',
            'inclusions' => '<ul><li>Chitwan NP Entry Fee</li><li>Jungle Activities (Elephant, Jeep, Canoe)</li><li>All Meals & Resort Stay</li><li>Tharu Cultural Program</li></ul>',
            'exclusions' => '<ul><li>Transport from Kathmandu/Pokhara</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-lakeside-tour',
            'service_category_id' => $toursSubcatModels['pokhara-tour']->id,
            'title' => 'Pokhara Lakeside & Adventure Tour',
            'short_description' => 'The best of Pokhara — Phewa Lake boat ride, World Peace Pagoda, Devi\'s Falls, Gupteswor Cave, and panoramic Annapurna views.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '2 Days / 1 Night',
            'price_from' => 145,
            'difficulty_level' => 'Easy',
            'max_group_size' => 15,
            'best_season' => 'Year-round',
            'maximum_altitude' => '827m',
            'start_end_point' => 'Pokhara',
            'inclusions' => '<ul><li>All Site Entry Fees</li><li>Phewa Lake Boat Ride</li><li>Expert Guide</li><li>Comfortable Transport</li></ul>',
            'exclusions' => '<ul><li>Accommodation</li><li>Meals (available nearby)</li></ul>',
        ]);

        $upsert([
            'slug' => 'upper-mustang-bike-tour',
            'service_category_id' => $toursSubcatModels['bike-tours']->id,
            'title' => 'Upper Mustang Mountain Bike Tour',
            'short_description' => 'Epic 12-day mountain bike journey through the Kali Gandaki gorge into the ancient forbidden kingdom of Lo Manthang.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '12 Days / 11 Nights',
            'price_from' => 2200,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Apr–Nov',
            'maximum_altitude' => '4,000m',
            'start_end_point' => 'Jomsom (fly from Pokhara)',
            'inclusions' => '<ul><li>Upper Mustang Restricted Permit</li><li>Quality Mountain Bikes & Helmets</li><li>Support Vehicle & Mechanic</li><li>All Meals & Lodge</li><li>Expert Cycling Guide</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Domestic Flights to Jomsom</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'ebc-helicopter-tour',
            'service_category_id' => $toursSubcatModels['heli-tours']->id,
            'title' => 'Everest Base Camp Helicopter Tour',
            'short_description' => 'Land at Everest Base Camp (5,364m) and Kalapatthar — see Everest, Lhotse, and Nuptse up-close without a 14-day trek.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 1200,
            'difficulty_level' => 'Easy',
            'max_group_size' => 5,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,644m',
            'start_end_point' => 'Kathmandu (Tribhuvan Airport)',
            'inclusions' => '<ul><li>Round-trip Helicopter</li><li>Kalapatthar Landing</li><li>EBC Landing</li><li>Breakfast at Everest View Hotel</li><li>All Permits</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'abc-helicopter-tour',
            'service_category_id' => $toursSubcatModels['heli-tours']->id,
            'title' => 'Annapurna Base Camp Helicopter Tour',
            'short_description' => 'Fly into the stunning Annapurna Sanctuary (4,130m) and land at ABC — surrounded by a natural amphitheatre of 8,000m peaks.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '1 Day',
            'price_from' => 650,
            'difficulty_level' => 'Easy',
            'max_group_size' => 5,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '4,130m',
            'start_end_point' => 'Pokhara Airport',
            'inclusions' => '<ul><li>Round-trip Helicopter</li><li>ABC Landing</li><li>All Permits</li></ul>',
            'exclusions' => '<ul><li>Travel Insurance</li><li>Personal Expenses</li></ul>',
        ]);

        // ═══════════════════════════════════════════
        //  ADVENTURES SERVICES
        // ═══════════════════════════════════════════

        $upsert([
            'slug' => 'island-peak-climbing',
            'service_category_id' => $adventureSubcatModels['peak-climbing']->id,
            'title' => 'Island Peak Climbing (Imja Tse)',
            'short_description' => 'Nepal\'s most popular trekking peak (6,189m) — a genuine Himalayan summit with fixed ropes, crampons, and stunning Lhotse face views.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '19 Days / 18 Nights',
            'price_from' => 2200,
            'difficulty_level' => 'Hard',
            'max_group_size' => 6,
            'best_season' => 'Apr–May & Sep–Oct',
            'maximum_altitude' => '6,189m',
            'start_end_point' => 'Lukla',
            'support_ratio' => '1 Guide:2',
            'deposit_requirement' => '30% ($660 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Peak Climbing Permit</li><li>All Khumbu Permits</li><li>Base Camp Cook & Equipment</li><li>Summit Ropes & Technical Guide</li></ul>',
            'exclusions' => '<ul><li>Personal Climbing Gear</li><li>Travel Insurance</li><li>International Flights</li></ul>',
        ]);

        $upsert([
            'slug' => 'mera-peak-climbing',
            'service_category_id' => $adventureSubcatModels['peak-climbing']->id,
            'title' => 'Mera Peak Climbing',
            'short_description' => 'Nepal\'s highest trekking peak (6,476m) — a non-technical high-altitude summit with the finest 5-x-8000m panorama in Nepal.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 2,
            'duration' => '20 Days / 19 Nights',
            'price_from' => 2400,
            'difficulty_level' => 'Hard',
            'max_group_size' => 6,
            'best_season' => 'Apr–May & Sep–Oct',
            'maximum_altitude' => '6,476m',
            'start_end_point' => 'Lukla',
            'support_ratio' => '1 Guide:2',
            'deposit_requirement' => '30% ($720 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Peak Climbing Permit</li><li>Base Camp Full Camping</li><li>Technical Summit Guide</li></ul>',
            'exclusions' => '<ul><li>Personal Climbing Gear</li><li>Travel Insurance</li><li>International Flights</li></ul>',
        ]);

        $upsert([
            'slug' => 'lobuche-east-peak-climbing',
            'service_category_id' => $adventureSubcatModels['peak-climbing']->id,
            'title' => 'Lobuche East Peak Climbing',
            'short_description' => 'A technical glaciated summit (6,119m) in the Khumbu with close-up Everest, Nuptse, and Pumori views.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 3,
            'duration' => '20 Days / 19 Nights',
            'price_from' => 2650,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 4,
            'best_season' => 'Apr–May & Sep–Oct',
            'maximum_altitude' => '6,119m',
            'start_end_point' => 'Lukla',
            'support_ratio' => '1 Guide:2',
            'deposit_requirement' => '30% ($795 USD)',
            'heli_evac_coverage' => 'Mandatory',
            'inclusions' => '<ul><li>Peak Permit & Khumbu Permits</li><li>Base Camp Camping & Cook</li><li>Technical Alpine Guide</li></ul>',
            'exclusions' => '<ul><li>Personal Gear & Insurance</li><li>International Flights</li></ul>',
        ]);

        $upsert([
            'slug' => 'annapurna-circuit-mountain-bike',
            'service_category_id' => $adventureSubcatModels['mountain-biking']->id,
            'title' => 'Annapurna Circuit Mountain Bike',
            'short_description' => 'One of the world\'s greatest mountain bike routes — 300+ km through the Kali Gandaki and over Thorong La (5,416m).',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '16 Days / 15 Nights',
            'price_from' => 1790,
            'difficulty_level' => 'Hard',
            'max_group_size' => 8,
            'best_season' => 'Mar–May & Sep–Nov',
            'maximum_altitude' => '5,416m',
            'start_end_point' => 'Besisahar / Pokhara',
            'inclusions' => '<ul><li>Quality Mountain Bikes & Helmets</li><li>ACAP & TIMS Permits</li><li>Support Vehicle & Mechanic</li><li>All Meals & Accommodation</li><li>Cycling Guide</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-paragliding',
            'service_category_id' => $adventureSubcatModels['paragliding']->id,
            'title' => 'Pokhara Paragliding',
            'short_description' => 'Tandem paraglide over the stunning Pokhara valley with Phewa Lake below and the Annapurna range towering ahead.',
            'status' => true,
            'is_featured' => true,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 95,
            'difficulty_level' => 'Easy',
            'max_group_size' => 20,
            'best_season' => 'Sep–May',
            'maximum_altitude' => '1,600m',
            'start_end_point' => 'Pokhara (Sarangkot)',
            'inclusions' => '<ul><li>Tandem Flight with Certified Pilot</li><li>GoPro Video Footage</li><li>Transport from Lakeside</li></ul>',
            'exclusions' => '<ul><li>Meals</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'bungee-jumping-bhote-koshi',
            'service_category_id' => $adventureSubcatModels['bungee-jumping']->id,
            'title' => 'Bhote Koshi Bungee Jump',
            'short_description' => 'One of Asia\'s highest and most thrilling bungee jumps — 160m free fall above the raging Bhote Koshi river gorge.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 120,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 20,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,800m',
            'start_end_point' => 'The Last Resort, Borderland (3 hrs from Kathmandu)',
            'inclusions' => '<ul><li>1 Bungee Jump</li><li>Safety Briefing & Equipment</li><li>Certificate</li></ul>',
            'exclusions' => '<ul><li>Transport from Kathmandu</li><li>Meals</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-ultralight-flight',
            'service_category_id' => $adventureSubcatModels['ultralight-flight']->id,
            'title' => 'Pokhara Ultralight Aircraft Flight',
            'short_description' => 'A breathtaking 30-minute ultralight flight over Pokhara valley — Phewa Lake, Annapurna, Machhapuchhre, and Dhaulagiri all at once.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 175,
            'difficulty_level' => 'Easy',
            'max_group_size' => 1,
            'best_season' => 'Year-round (morning flights)',
            'maximum_altitude' => '2,500m',
            'start_end_point' => 'Pokhara Airport',
            'inclusions' => '<ul><li>30-min Ultralight Flight</li><li>Certified Pilot</li><li>Flight Photos</li></ul>',
            'exclusions' => '<ul><li>Transport to Airport</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-hot-air-balloon',
            'service_category_id' => $adventureSubcatModels['hot-air-balloon']->id,
            'title' => 'Pokhara Hot Air Balloon Sunrise',
            'short_description' => 'Float above the Pokhara valley at sunrise in a hot air balloon — watching the Annapurna range glow in the first golden light.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 220,
            'difficulty_level' => 'Easy',
            'max_group_size' => 8,
            'best_season' => 'Sep–May (clear mornings)',
            'maximum_altitude' => '1,500m',
            'start_end_point' => 'Pokhara',
            'inclusions' => '<ul><li>1-hour Balloon Flight</li><li>Champagne Toast</li><li>Certificate</li><li>Transport from Lakeside</li></ul>',
            'exclusions' => '<ul><li>Meals</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'chitwan-jungle-safari-adventure',
            'service_category_id' => $adventureSubcatModels['jungle-safari']->id,
            'title' => 'Chitwan Jungle Safari & Wildlife',
            'short_description' => 'Track one-horned rhinos, Bengal tigers, and gharial crocodiles on foot and by jeep in Chitwan National Park.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '3 Days / 2 Nights',
            'price_from' => 290,
            'difficulty_level' => 'Easy',
            'max_group_size' => 10,
            'best_season' => 'Oct–May',
            'maximum_altitude' => '150m',
            'start_end_point' => 'Sauraha, Chitwan',
            'inclusions' => '<ul><li>Chitwan NP Entry</li><li>Jeep & Foot Safari</li><li>Canoe Ride</li><li>Naturalist Guide</li><li>All Meals & Lodge</li></ul>',
            'exclusions' => '<ul><li>Transport from Kathmandu</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'khumbu-birdwatching',
            'service_category_id' => $adventureSubcatModels['birdwatching']->id,
            'title' => 'Khumbu & Chitwan Birdwatching Tour',
            'short_description' => 'Nepal has 886 recorded bird species. This 10-day tour covers Chitwan\'s lowland birds and Khumbu\'s alpine species including the Himalayan Monal.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '10 Days / 9 Nights',
            'price_from' => 1100,
            'difficulty_level' => 'Easy',
            'max_group_size' => 8,
            'best_season' => 'Oct–Apr',
            'maximum_altitude' => '3,900m',
            'start_end_point' => 'Kathmandu',
            'inclusions' => '<ul><li>Expert Ornithologist Guide</li><li>All Permits & NP Fees</li><li>Binoculars Provided</li><li>All Meals & Accommodation</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'nagarjun-rock-climbing',
            'service_category_id' => $adventureSubcatModels['rock-climbing']->id,
            'title' => 'Nagarjun Rock Climbing Course',
            'short_description' => 'Introductory and intermediate rock climbing on natural granite crags in the Nagarjun forest, just 30 minutes from Thamel.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '2 Days',
            'price_from' => 180,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Year-round',
            'maximum_altitude' => '2,100m',
            'start_end_point' => 'Kathmandu (Nagarjun)',
            'inclusions' => '<ul><li>All Climbing Gear</li><li>Certified Instructor</li><li>Lunch</li></ul>',
            'exclusions' => '<ul><li>Transport</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'khumbu-ice-climbing',
            'service_category_id' => $adventureSubcatModels['ice-climbing']->id,
            'title' => 'Khumbu Icefall Ice Climbing',
            'short_description' => 'Train on glaciated seracs and ice walls at 5,000m+ near Lobuche — with expert guides and full technical equipment provided.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '14 Days / 13 Nights',
            'price_from' => 2100,
            'difficulty_level' => 'Extreme',
            'max_group_size' => 4,
            'best_season' => 'Nov–Dec & Mar–Apr',
            'maximum_altitude' => '5,000m',
            'start_end_point' => 'Lukla',
            'inclusions' => '<ul><li>All Khumbu Permits</li><li>Ice Climbing Equipment</li><li>Expert Alpine Guide</li><li>All Meals & Tea House</li></ul>',
            'exclusions' => '<ul><li>International Flights</li><li>Personal Gear</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-zipline',
            'service_category_id' => $adventureSubcatModels['zipline']->id,
            'title' => 'Pokhara Zipline (Hemja)',
            'short_description' => 'The world\'s steepest zipline — 1.8km and 600m vertical drop above Pokhara with Annapurna panorama at terminal velocity.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 95,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 20,
            'best_season' => 'Year-round',
            'maximum_altitude' => '1,500m',
            'start_end_point' => 'Pokhara (Hemja)',
            'inclusions' => '<ul><li>2 Zipline Runs</li><li>Safety Gear & Briefing</li><li>GoPro Video</li></ul>',
            'exclusions' => '<ul><li>Transport from Lakeside</li></ul>',
        ]);

        $upsert([
            'slug' => 'bhote-koshi-canyoning',
            'service_category_id' => $adventureSubcatModels['canyoning']->id,
            'title' => 'Bhote Koshi Canyoning',
            'short_description' => 'Descend through the dramatic Bhote Koshi gorge — abseiling waterfalls, swimming through pools, and jumping into natural jacuzzis.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '2 Days / 1 Night',
            'price_from' => 160,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 12,
            'best_season' => 'Sep–Nov & Mar–May',
            'maximum_altitude' => '1,800m',
            'start_end_point' => 'The Last Resort (3 hrs from Kathmandu)',
            'inclusions' => '<ul><li>All Canyoning Equipment</li><li>Professional Safety Guide</li><li>Meals & Camp</li></ul>',
            'exclusions' => '<ul><li>Transport from Kathmandu</li><li>Travel Insurance</li></ul>',
        ]);

        $upsert([
            'slug' => 'seti-river-kayaking',
            'service_category_id' => $adventureSubcatModels['kayaking-paddling']->id,
            'title' => 'Seti River Kayaking & Paddling',
            'short_description' => 'White-water kayaking through the Seti River gorge near Pokhara — suitable for beginners through intermediate paddlers.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '2 Days',
            'price_from' => 140,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 10,
            'best_season' => 'Sep–Nov & Mar–May',
            'maximum_altitude' => '800m',
            'start_end_point' => 'Pokhara',
            'inclusions' => '<ul><li>Kayak, Paddle & Safety Gear</li><li>Qualified River Guide</li><li>Riverside Lunch</li></ul>',
            'exclusions' => '<ul><li>Transport</li><li>Personal Expenses</li></ul>',
        ]);

        $upsert([
            'slug' => 'pokhara-skydiving',
            'service_category_id' => $adventureSubcatModels['skydiving']->id,
            'title' => 'Pokhara Tandem Skydive',
            'short_description' => 'Freefall at 120mph from 15,000 feet above Pokhara — with the Annapurna Himalayan range filling the horizon on every side.',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
            'duration' => '1 Day',
            'price_from' => 350,
            'difficulty_level' => 'Moderate',
            'max_group_size' => 8,
            'best_season' => 'Sep–May',
            'maximum_altitude' => '4,572m',
            'start_end_point' => 'Pokhara Airport',
            'inclusions' => '<ul><li>Tandem Jump with Certified Instructor</li><li>Freefall Video & Photos</li><li>Safety Briefing & Gear</li><li>Certificate</li></ul>',
            'exclusions' => '<ul><li>Transport</li><li>Meals</li></ul>',
        ]);

        $this->command->info('✓ NepalServicesSeeder complete — categories, treks, tours & adventures seeded.');
    }
}
