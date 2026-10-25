<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\LegalDocument;
use Illuminate\Database\Seeder;

class LegalDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'title' => 'Company Registration Certificate',
                'slug' => 'company-registration-certificate',
                'status' => true,
            ],
            [
                'title' => 'Department of Tourism License (MOCTA)',
                'slug' => 'department-of-tourism-license',
                'status' => true,
            ],
            [
                'title' => 'Nepal Tourism Board (NTB) Affiliation',
                'slug' => 'nepal-tourism-board-affiliation',
                'status' => true,
            ],
            [
                'title' => 'Trekking Agencies Association of Nepal (TAAN) Certificate',
                'slug' => 'taan-membership-certificate',
                'status' => true,
            ],
            [
                'title' => 'Nepal Mountaineering Association (NMA) Membership',
                'slug' => 'nma-membership-certificate',
                'status' => true,
            ],
            [
                'title' => 'Nepal Rastra Bank Foreign Exchange Permit',
                'slug' => 'central-bank-foreign-exchange-permit',
                'status' => true,
            ],
            [
                'title' => 'Inland Revenue Department (PAN & VAT Registration)',
                'slug' => 'pan-vat-registration-certificate',
                'status' => true,
            ],
            [
                'title' => 'Department of Cottage & Small Industries Registration',
                'slug' => 'cottage-and-small-industries-registration',
                'status' => true,
            ],
        ];

        foreach ($documents as $doc) {
            LegalDocument::updateOrCreate(
                ['slug' => $doc['slug']],
                [
                    'title' => $doc['title'],
                    'status' => $doc['status'],
                ]
            );
        }

        LegalDocument::flushCache();
    }
}
