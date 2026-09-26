<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class HomePageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'hero_title',
                'value' => 'Experience the Ultimate Himalayan Trekking Adventure',
                'group' => 'homepage',
                'type' => 'text',
            ],
            [
                'key' => 'hero_highlighted_text',
                'value' => 'Ultimate,Adventure',
                'group' => 'homepage',
                'type' => 'text',
            ],
            [
                'key' => 'hero_text',
                'value' => 'Embark on an unforgettable journey through the heart of the Himalayas. We offer expertly guided treks, authentic cultural experiences, and unparalleled safety. Start planning your lifetime adventure today.',
                'group' => 'homepage',
                'type' => 'textarea',
            ],
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
