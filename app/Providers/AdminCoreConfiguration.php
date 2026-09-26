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
        return parent::modules();
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
                type: 'text',
                label: 'Deposit Requirement',
                placeholder: 'e.g. 20% ($350 USD)',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'heli_evac_coverage',
                type: 'text',
                label: 'Heli-Evac Coverage',
                placeholder: 'e.g. Mandatory / Monitored',
                validationRule: 'nullable|string|max:255',
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
                ]
            ]
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
                label: 'Dossier Title',
                placeholder: 'e.g. Russian Alpine Club - Annapurna Base Camp',
                validationRule: 'nullable|string|max:255',
            ),
            ServiceFormField::make(
                name: 'dossier_description',
                type: 'textarea',
                label: 'Dossier Description',
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
}
