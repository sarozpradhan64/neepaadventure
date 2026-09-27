<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class SeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'seo_default_title',
                'value' => 'Neepa Adventure - Trekking & Climbing in Nepal',
                'group' => 'seo',
                'type' => 'string',
            ],
            [
                'key' => 'seo_default_description',
                'value' => 'Experience the best trekking, climbing, and adventure tours in Nepal with Neepa Adventure. Discover the Himalayas with expert local guides.',
                'group' => 'seo',
                'type' => 'string',
            ],
            [
                'key' => 'seo_default_keywords',
                'value' => 'trekking in nepal, everest base camp, nepal adventure, himalayas, hiking, climbing',
                'group' => 'seo',
                'type' => 'string',
            ],
            [
                'key' => 'seo_default_image',
                'value' => null,
                'group' => 'seo',
                'type' => 'string',
            ],
            [
                'key' => 'google_analytics',
                'value' => '',
                'group' => 'seo',
                'type' => 'string',
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
