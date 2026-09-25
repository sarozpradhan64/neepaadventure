<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Marcus & Elena Vance',
                'role' => 'Everest & Gokyo Lakes • Oct 2024',
                'company' => null,
                'content' => 'We had unexpected fresh snow on Cho La, but Dawa and Ang Karma guided our group with absolute calm and expertise. Their attention to our pulse ox twice daily made everyone feel confident and safe.',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Julian Richter',
                'role' => 'Island Peak Expedition • Nov 2024',
                'company' => null,
                'content' => 'The mountaineering refresher at High Camp was thorough. On summit day, my climbing Sherpa Pemba paced me like clockwork up the headwall. Standing at 6,189m at sunrise is an experience I will cherish forever.',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chloe Deschenes',
                'role' => 'Manaslu Circuit • Apr 2024',
                'company' => null,
                'content' => 'No crowd jams, raw Tibetan culture, and incredible Sherpa care. Even when my bag zipper tore, our porter carried special repair tape. Outstanding logistics from Kathmandu airport to the mountain and back.',
                'rating' => 5,
                'status' => true,
                'is_featured' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::create($data);
        }
    }
}
