<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Job;
use Blaze\AdminCore\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = JobCategory::firstOrCreate(
            ['slug' => 'guiding-field-staff'],
            [
                'title' => 'Guiding & Field Staff',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        Job::firstOrCreate(
            ['slug' => 'senior-trekking-guide'],
            [
                'job_category_id' => $category->id,
                'title' => 'Senior Trekking Guide',
                'excerpt' => 'Lead international trekking groups safely through high-altitude Himalayan passes while sharing deep cultural and environmental knowledge.',
                'description' => '<p>We are seeking a highly experienced <strong>Senior Trekking Guide</strong> to lead our premium, small-group adventures across the Everest, Annapurna, and Langtang regions.</p>
                                  <p>As a Senior Guide at Neepa Adventure, you are the face of our company in the mountains. You will be responsible for the safety, well-being, and satisfaction of our clients, ensuring that every trek upholds our rigorous standards for ethical mountain travel and regenerative tourism.</p>',
                'requirements' => '<ul>
                                    <li>Minimum 7 years of experience leading high-altitude treks (above 5,000m) in Nepal.</li>
                                    <li>Valid Nepal Government Trekking Guide License.</li>
                                    <li>Current Wilderness First Responder (WFR) or advanced First Aid certification.</li>
                                    <li>Fluency in English (additional languages like French or German are a plus).</li>
                                    <li>Deep knowledge of local culture, flora, fauna, and geography.</li>
                                    <li>Strong leadership and crisis management skills.</li>
                                   </ul>',
                'positions' => 3,
                'location' => 'Kathmandu / Khumbu / Annapurna Regions',
                'salary' => 'Highly Competitive + Insurance + Gear Allowance',
                'deadline' => now()->addMonths(2)->format('Y-m-d'),
                'status' => true,
                'sort_order' => 1,
            ]
        );
    }
}
