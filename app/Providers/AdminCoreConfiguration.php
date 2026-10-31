<?php

namespace App\Providers;

use Blaze\AdminCore\AdminCoreConfiguration as BaseAdminCoreConfiguration;
use Blaze\AdminCore\Support\ServiceFormField;

class AdminCoreConfiguration extends BaseAdminCoreConfiguration
{
    /**
     * @return array<string, bool>
     */
    public function modules(): array
    {
        return array_merge(parent::modules(), [
            'downloads' => false,
        ]);
    }

    /**
     * @return array<string, bool>
     */
    public function features(): array
    {
        return array_merge(parent::features(), [
            'hero_highlighted_text' => true,
        ]);
    }

    /**
     * Extra columns specific to neepaadventure that extend the base services table.
     *
     * Each entry here must have a matching column added via a project-level
     * alter migration (see SERVICES_SCHEMA_EXTENSION.md).
     *
     * @return ServiceFormField[]
     */
    public function serviceFormFields(): array
    {
        return [
            ServiceFormField::make(
                name: 'duration',
                type: 'text',
                label: 'Duration',
                placeholder: 'e.g. 3 Days / 2 Nights',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'price_from',
                type: 'number',
                label: 'Price From (USD)',
                placeholder: '0.00',
                validationRule: 'nullable|numeric|min:0',
                attributes: ['step' => '0.01'],
            ),
            ServiceFormField::make(
                name: 'discount_amount',
                type: 'number',
                label: 'Discount Amount (USD)',
                placeholder: '0.00',
                validationRule: 'nullable|numeric|min:0|lte:price_from',
                attributes: ['step' => '0.01'],
            ),
            ServiceFormField::make(
                name: 'difficulty_level',
                type: 'select',
                label: 'Difficulty Level',
                validationRule: 'nullable|in:easy,moderate,hard,extreme',
                options: [
                    'easy' => 'Easy',
                    'moderate' => 'Moderate',
                    'hard' => 'Hard',
                    'extreme' => 'Extreme',
                ],
            ),
            ServiceFormField::make(
                name: 'max_group_size',
                type: 'number',
                label: 'Max Group Size',
                placeholder: 'e.g. 12',
                validationRule: 'nullable|integer|min:1',
            ),
            ServiceFormField::make(
                name: 'best_season',
                type: 'text',
                label: 'Best Season',
                placeholder: 'e.g. March – May, Sep – Nov',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'maximum_altitude',
                type: 'text',
                label: 'Maximum Altitude',
                placeholder: 'e.g. 5,364 m (17,598 ft)',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'inclusions',
                type: 'richtext',
                label: 'Inclusions',
                validationRule: 'nullable|string',
            ),
            ServiceFormField::make(
                name: 'exclusions',
                type: 'richtext',
                label: 'Exclusions',
                validationRule: 'nullable|string',
            ),
            ServiceFormField::make(
                name: 'start_end_point',
                type: 'text',
                label: 'Start & End Point',
                placeholder: 'e.g. Lukla (Tenzing-Hillary)',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'support_ratio',
                type: 'text',
                label: 'Support Ratio',
                placeholder: 'e.g. 1 Guide:4 & 1 Porter:2',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'deposit_requirement',
                type: 'number',
                label: 'Deposit Requirement (%)',
                placeholder: 'e.g. 20',
                validationRule: 'nullable|integer|between:1,100',
            ),
            ServiceFormField::make(
                name: 'heli_evac_coverage',
                type: 'text',
                label: 'Heli-Evac Coverage',
                placeholder: 'e.g. Mandatory / Monitored',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'map_image',
                type: 'file',
                label: 'Route / Waypoint Map Image',
                validationRule: 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:10240',
            ),
        ];
    }

    public function serviceFeatureFormFields(): array
    {
        return [
            ServiceFormField::make(
                name: 'day_label',
                type: 'text',
                label: 'Day Label',
                placeholder: 'e.g. Day 1',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'altitude',
                type: 'text',
                label: 'Altitude',
                placeholder: 'e.g. 1,400m / 4,593ft',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'walking_time',
                type: 'text',
                label: 'Walking Time',
                placeholder: 'e.g. 4-5 hours',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'distance',
                type: 'text',
                label: 'Distance',
                placeholder: 'e.g. 10 km',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'accommodation',
                type: 'text',
                label: 'Accommodation',
                placeholder: 'e.g. Tea House',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'meals',
                type: 'text',
                label: 'Meals',
                placeholder: 'e.g. B, L, D',
                validationRule: 'nullable|string|max:255',
            ),
        ];
    }

    public function customSidebarItems(): array
    {
        return [
            'services' => [
                [
                    'label' => 'Departures',
                    'route' => 'admin.service-departures.index',
                    'activeRoute' => 'admin.service-departures.*',
                ],
            ],
        ];
    }

    public function projectFormFields(): array
    {
        return [
            ServiceFormField::make(
                name: 'duration',
                type: 'text',
                label: 'Duration',
                placeholder: 'e.g. 11 Days',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'max_altitude',
                type: 'text',
                label: 'Maximum Altitude',
                placeholder: 'e.g. 4,130m',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'destination_success',
                type: 'text',
                label: 'Destination Success / Team Completion',
                placeholder: 'e.g. 100% (12/12)',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'lead_by',
                type: 'text',
                label: 'Lead By',
                placeholder: 'e.g. Dawa Sherpa',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'season',
                type: 'text',
                label: 'Season',
                placeholder: 'e.g. Winter 2024',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'team_size',
                type: 'text',
                label: 'Team Size',
                placeholder: 'e.g. 12 Climbers',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'nation',
                type: 'text',
                label: 'Nation Name',
                placeholder: 'e.g. Russia',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'dossier_title',
                type: 'text',
                label: 'Blog Title',
                placeholder: 'e.g. Russian Alpine Club - Annapurna Base Camp',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'dossier_description',
                type: 'textarea',
                label: 'Blog Description',
                placeholder: 'e.g. Complete operational debrief...',
                validationRule: 'nullable|string',
            ),
            ServiceFormField::make(
                name: 'inclusions',
                type: 'richtext',
                label: 'Logistical Feats / Inclusions',
                validationRule: 'nullable|string',
            ),
        ];
    }

    /**
     * Homepage section definitions specific to Neepa Adventure.
     *
     * @return array<int, array{
     *     type: string,
     *     name: string,
     *     title: string,
     *     subtitle?: string,
     *     button_text?: string,
     *     button_url?: string,
     *     badgeClass?: string
     * }>
     */
    public function homepageSectionDefinitions(): array
    {
        return [
            [
                'type' => 'about_us',
                'name' => 'About Us',
                'title' => 'Setting the Standard in Trekking Excellence',
                'subtitle' => 'Who We Are',
                'button_text' => 'Read Our Full Story',
                'button_url' => '/about-us',
                'badgeClass' => 'bg-blue-500/10 text-blue-700 border-blue-300 dark:border-blue-800 hover:bg-blue-500/20',
            ],
            [
                'type' => 'departures',
                'name' => 'Departures',
                'title' => '2026/27 Guaranteed Departures',
                'subtitle' => 'Limited Slots',
                'button_text' => 'Explore All Schedules',
                'button_url' => '/schedules',
                'badgeClass' => 'bg-emerald-500/10 text-emerald-700 border-emerald-300 dark:border-emerald-800 hover:bg-emerald-500/20',
            ],
            [
                'type' => 'why_trek',
                'name' => 'Why Trek / Standards',
                'title' => 'Built on Guide Heritage & Clinical Safety',
                'subtitle' => 'The Neepa Standard',
                'button_text' => 'Learn More',
                'button_url' => '/about-us',
                'badgeClass' => 'bg-purple-500/10 text-purple-700 border-purple-300 dark:border-purple-800 hover:bg-purple-500/20',
            ],
            [
                'type' => 'team_guides',
                'name' => 'Guides & Leaders',
                'title' => 'Meet Our Trek Leaders',
                'subtitle' => 'The Mountain Guardians',
                'button_text' => 'Meet All Guides',
                'button_url' => '/about-us/team',
                'badgeClass' => 'bg-cyan-500/10 text-cyan-700 border-cyan-300 dark:border-cyan-800 hover:bg-cyan-500/20',
            ],
            [
                'type' => 'reviews',
                'name' => 'Reviews & Feedback',
                'title' => 'Hear From Our Clients',
                'subtitle' => 'Voices from the Pass',
                'button_text' => 'Write a Review',
                'button_url' => '/write-review',
                'badgeClass' => 'bg-rose-500/10 text-rose-700 border-rose-300 dark:border-rose-800 hover:bg-rose-500/20',
            ],
            [
                'type' => 'blogs',
                'name' => 'Blogs & Guides',
                'title' => 'Latest Travel Guides',
                'subtitle' => 'Get Inspired',
                'button_text' => 'View All Posts',
                'button_url' => '/blogs',
                'badgeClass' => 'bg-indigo-500/10 text-indigo-700 border-indigo-300 dark:border-indigo-800 hover:bg-indigo-500/20',
            ],
            [
                'type' => 'cta',
                'name' => 'CTA Banner',
                'title' => 'Ready to Walk Among the Himalayan Giants?',
                'subtitle' => 'Fast Response Trek Desk',
                'button_text' => 'Talk to an Expert',
                'button_url' => '/plan-your-trek',
                'badgeClass' => 'bg-amber-500/10 text-amber-700 border-amber-300 dark:border-amber-800 hover:bg-amber-500/20',
            ],
        ];
    }
}
