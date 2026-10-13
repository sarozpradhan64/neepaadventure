<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Affiliation;
use Blaze\AdminCore\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class AffiliationAndPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Affiliations
        $affiliations = [
            [
                'name' => "TAAN (Trekking Agencies' Association of Nepal)",
                'logo' => 'affiliation/taan.svg',
                'link' => 'https://www.taan.org.np',
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Nepal Tourism Board (NTB)',
                'logo' => 'affiliation/ntb.svg',
                'link' => 'https://ntb.gov.np',
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Nepal Mountaineering Association (NMA)',
                'logo' => 'affiliation/nma.svg',
                'link' => 'https://www.nepalmountaineering.org',
                'status' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($affiliations as $affiliation) {
            Affiliation::updateOrCreate(
                ['name' => $affiliation['name']],
                $affiliation
            );
        }

        // 2. We Accept (Payment Methods)
        $paymentMethods = [
            [
                'name' => 'Visa Card',
                'logo' => 'payment-method/visa.svg',
                'details' => '<p>We accept all international and domestic <strong>Visa Credit, Debit, and Prepaid cards</strong>.</p><ul><li>No hidden currency conversion fees on USD transactions.</li><li>Standard bank gateway surcharge of 3.5% applies for online card terminal processing.</li><li>Transactions are fully secured by Visa 3D-Secure 2.0.</li></ul>',
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Master Card',
                'logo' => 'payment-method/mastercard.svg',
                'details' => '<p>We accept all <strong>MasterCard Worldwide</strong> credit and debit cards.</p><ul><li>Instant booking clearance and receipt generation upon confirmation.</li><li>Supports multi-currency billing (USD, EUR, GBP, AUD, CAD).</li><li>Protected by Mastercard Identity Check.</li></ul>',
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Dollar Card',
                'logo' => 'payment-method/dollar-card.svg',
                'details' => '<p>Nepali travelers and international clients can pay seamlessly using <strong>USD Prepaid Dollar Cards</strong> issued by any commercial bank.</p><ul><li>Supported under standard international travel prepaid card guidelines.</li><li>Zero foreign exchange loss for USD trek bookings.</li><li>Instant booking confirmation upon verification.</li></ul>',
                'status' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::updateOrCreate(
                ['name' => $method['name']],
                $method
            );
        }
    }
}
