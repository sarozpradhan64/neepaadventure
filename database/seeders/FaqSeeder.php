<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How soon before departure must trekking & trekking permits be finalized?',
                'answer' => '<p>Standard trekking permits (TIMS, Sagarmatha, ACAP) take 24–48 hours to stamp at Nepal Tourism Board. For restricted zones (Manaslu, Upper Mustang, Nar Phu, Dolpo) and NMA Pass Trekking permits (Island Pass, Mera, Lobuche), we require your passport scans and high-resolution photos at least 15 business days in advance to secure government officer assignments.</p>',
                'status' => true,
                'is_contact_page' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'Do you accommodate custom route adjustments due to weather or acclimatization?',
                'answer' => '<p>Absolutely. Safety is our non-negotiable metric. Every lead Guide is equipped with pulse oximeters, Lake Louise Acute Mountain Sickness (AMS) score sheets, and Garmin inReach satellite devices. If weather conditions close high passes (such as Cho La or Thorong La) or acclimatization requires extra rest days, our operations desk dynamically recalibrates your teahouse bookings without logistical friction.</p>',
                'status' => true,
                'is_contact_page' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'How are payments, deposits, and emergency rescue bonds handled?',
                'answer' => '<p>A 25% deposit secures your trek slots, pass permits, and domestic Lukla/Pokhara flight reservations via direct bank wire transfer or major credit card through Nepal Investment Mega Bank (NIMB) secure gateway. The remaining balance can be settled in Kathmandu before departure. We also coordinate cashless medical evacuation guarantees directly with your trekking travel insurance provider (e.g., Ripcord, Global Rescue, Allianz).</p>',
                'status' => true,
                'is_contact_page' => true,
                'sort_order' => 3,
            ],
            [
                'question' => 'Can we meet our Lead Guide Sirdar before heading to Lukla or Pokhara?',
                'answer' => '<p>Yes. On Day 1 in Kathmandu, our official Trek Welcome Dinner & Strategy Briefing introduces you directly to your assigned Lead Guide, Sirdar, and Assistant Guides. You will review maps, discuss pacing, adjust individual preferences, and conduct an intimate equipment Q&A session together.</p>',
                'status' => true,
                'is_contact_page' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($faqs as $faqData) {
            Faq::updateOrCreate(
                ['question' => $faqData['question']],
                $faqData
            );
        }
    }
}
