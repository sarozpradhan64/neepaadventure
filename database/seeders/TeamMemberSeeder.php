<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Krishna Prasad Dahal',
                'designation' => 'Founder & Expedition Director',
                'department' => 'Expedition Leadership',
                'bio' => 'With over 18 years across the Himalayas, Krishna has guided expeditions spanning the Annapurna Circuit, Everest Base Camp, and Manaslu. A passionate advocate for ethical, sustainable trekking.',
                'image' => 'team/krishna.jpg',
                'email' => 'krishna@neepaadventure.com',
                'phone' => '+977-9808389420',
                'facebook_url' => 'https://facebook.com/neepaadventure',
                'instagram_url' => 'https://instagram.com/neepaadventure',
                'linkedin_url' => 'https://linkedin.com/company/neepaadventure',
                'twitter_url' => 'https://x.com/neepaadventure',
                'sort_order' => 1,
                'status' => true,
                'is_guide' => true,
                'featured' => true,
            ],
            [
                'name' => 'Dawa Tenzing Sherpa',
                'designation' => 'Senior High-Altitude Sardar',
                'department' => 'Field Operations',
                'bio' => 'Born in Khumjung, Dawa brings over 22 years of high-altitude navigation expertise. Certified by the Nepal Mountaineering Association with multiple 8,000m summits.',
                'image' => 'team/dawa.jpg',
                'email' => 'dawa@neepaadventure.com',
                'phone' => '+977-9841234567',
                'facebook_url' => 'https://facebook.com/neepaadventure',
                'instagram_url' => 'https://instagram.com/neepaadventure',
                'linkedin_url' => 'https://linkedin.com/company/neepaadventure',
                'twitter_url' => null,
                'sort_order' => 2,
                'status' => true,
                'is_guide' => true,
                'featured' => true,
            ],
            [
                'name' => 'Pasang Lhamu Sherpa',
                'designation' => 'IFMGA Mountain Guide & Safety Lead',
                'department' => 'Safety & Medical',
                'bio' => 'Certified IFMGA guide and wilderness first responder trainer. Pasang specializes in technical route safety, satellite telemetry, and women-led Himalayan journeys.',
                'image' => 'team/pasang.jpg',
                'email' => 'pasang@neepaadventure.com',
                'phone' => '+977-9812345678',
                'facebook_url' => 'https://facebook.com/neepaadventure',
                'instagram_url' => 'https://instagram.com/neepaadventure',
                'linkedin_url' => 'https://linkedin.com/company/neepaadventure',
                'twitter_url' => 'https://x.com/neepaadventure',
                'sort_order' => 3,
                'status' => true,
                'is_guide' => true,
                'featured' => true,
            ],
            [
                'name' => 'Maya Gurung',
                'designation' => 'Trek Operations & Guest Experience',
                'department' => 'Kathmandu Logistics',
                'bio' => 'Coordinates permits, flight charters, and customized trek itineraries. Maya ensures every traveler experiences seamless logistics from arrival in Kathmandu to final summit departure.',
                'image' => null,
                'email' => 'maya@neepaadventure.com',
                'phone' => '+977-1-4700000',
                'facebook_url' => 'https://facebook.com/neepaadventure',
                'instagram_url' => 'https://instagram.com/neepaadventure',
                'linkedin_url' => 'https://linkedin.com/company/neepaadventure',
                'twitter_url' => null,
                'sort_order' => 4,
                'status' => true,
                'is_guide' => false,
                'featured' => false,
            ],
        ];

        foreach ($members as $data) {
            TeamMember::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
