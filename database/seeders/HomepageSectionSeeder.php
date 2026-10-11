<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\HomepageSection;
use Blaze\AdminCore\Models\Service;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceIds = Service::where('status', true)->pluck('id')->toArray();

        $sections = [
            [
                'section_type' => 'custom_services',
                'title' => 'Our Best-Selling Trips for 2026',
                'subtitle' => 'Top Recommended Adventures',
                'content' => 'Handpicked Himalayan journeys loved by our past travelers with guaranteed dates and top-rated guides.',
                'button_text' => 'Explore Trips',
                'button_url' => '/treks',
                'settings' => ['service_ids' => array_slice($serviceIds, 0, 4)],
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'section_type' => 'departures',
                'title' => '2026/27 Guaranteed Departures',
                'subtitle' => 'Limited Slots',
                'content' => 'Lock in your adventure early. Fixed departure dates with confirmed groups, expert lead guides, and early-bird savings.',
                'button_text' => 'Explore All Schedules',
                'button_url' => '/schedules',
                'settings' => ['service_ids' => []],
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'section_type' => 'custom_services',
                'title' => 'Our Featured Trips for 2026',
                'subtitle' => 'Exclusive High Altitude Expeditions',
                'content' => 'Exceptional routes off the beaten path designed for true mountain lovers.',
                'button_text' => 'View Featured',
                'button_url' => '/treks',
                'settings' => ['service_ids' => array_slice($serviceIds, 0, 2)],
                'sort_order' => 4,
                'status' => true,
            ],
            [
                'section_type' => 'why_trek',
                'title' => 'The Neepa Standard',
                'subtitle' => 'Built on Guide Heritage & Clinical Safety',
                'content' => 'We do not outsource your safety to contractors. Every itinerary is led by our full-time Kathmandu & Khumbu trek family.',
                'button_text' => null,
                'button_url' => null,
                'settings' => ['service_ids' => []],
                'sort_order' => 5,
                'status' => true,
            ],
            [
                'section_type' => 'team_guides',
                'title' => 'Meet Our Trek Leaders',
                'subtitle' => 'The Mountain Guardians',
                'content' => 'You Are in the Hands of Nepal\'s Finest Trekkers. Every Neepa Adventure trekker is paired with authentic Guides born and raised in high-altitude Khumbu, Rolwaling, or Dolpo valleys.',
                'button_text' => 'Meet All Guides',
                'button_url' => '/about-us/team',
                'settings' => ['service_ids' => []],
                'sort_order' => 6,
                'status' => true,
            ],
            [
                'section_type' => 'reviews',
                'title' => 'Hear From Our Clients',
                'subtitle' => 'Voices from the Pass',
                'content' => 'Authentic reviews and testimonials from climbers and trekkers who have conquered high passes with Neepa Adventure.',
                'button_text' => 'Write a Review',
                'button_url' => '/write-review',
                'settings' => ['service_ids' => []],
                'sort_order' => 7,
                'status' => true,
            ],
            [
                'section_type' => 'blogs',
                'title' => 'Latest Travel Guides',
                'subtitle' => 'Get Inspired',
                'content' => 'Expert tips, acclimatization guides, packing lists, and stories from the Himalayas.',
                'button_text' => 'View All Posts',
                'button_url' => '/blogs',
                'settings' => ['service_ids' => []],
                'sort_order' => 8,
                'status' => true,
            ],
            [
                'section_type' => 'cta',
                'title' => 'Ready to Walk Among the Himalayan Giants?',
                'subtitle' => 'Fast Response Trek Desk',
                'content' => 'Receive a personalized day-by-day itinerary, custom teahouse selection, and a complimentary altitude readiness assessment within 2 hours.',
                'button_text' => 'Talk to an Expert',
                'button_url' => '/plan-your-trek',
                'settings' => ['service_ids' => []],
                'sort_order' => 9,
                'status' => true,
            ],
        ];

        foreach ($sections as $section) {
            HomepageSection::updateOrCreate(
                [
                    'section_type' => $section['section_type'],
                    'title' => $section['title'],
                ],
                $section
            );
        }
    }
}
