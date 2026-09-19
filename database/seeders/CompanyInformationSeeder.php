<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Company Information
        ContactInformation::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Neepa Adventure Pvt. Ltd.',
                'email' => 'adventureneepa@gmail.com',
                'phone' => '+977-9808389420',
                'whatsapp' => '+977-9808389420',
                'address' => 'Mahalaxmi 08, Lubhoo, Lalitpur',
                'google_maps_url' => 'J9WG+4R7, ललितपुर, बागमती प्रदेश',
            ]
        );

        // 2. Settings (Slogan and Email Password)
        WebsiteSetting::updateOrCreate(
            ['key' => 'slogan'],
            ['value' => 'Explore Nepal. Experience the Himalayas.', 'type' => 'text', 'group' => 'general']
        );

        WebsiteSetting::updateOrCreate(
            ['key' => 'email_password'],
            ['value' => '0328919s', 'type' => 'text', 'group' => 'mail']
        );

        // 3. Social Media Links
        $socials = [
            ['platform' => 'Instagram', 'url' => 'https://www.instagram.com/neepaadventure', 'icon' => 'fab fa-instagram', 'sort_order' => 1, 'status' => true],
            ['platform' => 'Tiktok', 'url' => 'https://www.tiktok.com/@neepaadventure', 'icon' => 'fab fa-tiktok', 'sort_order' => 2, 'status' => true],
            ['platform' => 'Facebook', 'url' => 'https://www.facebook.com/neepaadventure', 'icon' => 'fab fa-facebook', 'sort_order' => 3, 'status' => true],
            ['platform' => 'Trip Advisor', 'url' => 'https://www.tripadvisor.com/Profile/neepaadventure', 'icon' => 'fab fa-tripadvisor', 'sort_order' => 4, 'status' => true],
        ];

        foreach ($socials as $social) {
            SocialLink::updateOrCreate(
                ['platform' => $social['platform']],
                $social
            );
        }
    }
}
