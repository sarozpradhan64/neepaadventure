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
                'value' => 'Conquer the World\'s Highest Passes with Guide Mastery',
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
                'value' => 'Pioneering 100% safety records across Nepal\'s 8,000m trails. Led by certified Guide leaders with sustainable zero-plastic ethics and intimate small trek teams.',
                'group' => 'homepage',
                'type' => 'textarea',
            ],
            [
                'key' => 'hero_stats',
                'value' => json_encode([
                    ['icon' => 'award', 'value' => '10+', 'label' => 'years of experience'],
                    ['icon' => 'leaf', 'value' => '', 'label' => 'Sustainable and Responsible Tourism'],
                    ['icon' => 'compass', 'value' => '', 'label' => 'Authentic Nepali Experience'],
                    ['icon' => 'users', 'value' => '', 'label' => 'Local Experienced Team'],
                    ['icon' => 'map', 'value' => '', 'label' => 'Bespoke Packages'],
                    ['icon' => 'users-round', 'value' => '', 'label' => 'Small Groups'],
                ]),
                'group' => 'homepage',
                'type' => 'json',
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
