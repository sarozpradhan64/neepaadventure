<?php

namespace App\Providers;

use Blaze\AdminCore\Models\Affiliation;
use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\LegalDocument;
use Blaze\AdminCore\Models\Menu;
use Blaze\AdminCore\Models\PaymentMethod;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\TeamMember;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TailwindMerge\Contracts\TailwindMergeContract;
use TailwindMerge\TailwindMerge;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (file_exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }

        $this->app->extend(TailwindMergeContract::class, function ($service, $app) {
            return TailwindMerge::factory()
                ->withConfiguration(config('tailwind-merge', []))
                ->withCache($app->make('cache')->store('array'))
                ->make();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $data = [
                'contact' => ContactInformation::cached(),
                'socials' => SocialLink::cached(),
                'websiteSettings' => WebsiteSetting::cached(),
                'navLegalDocuments' => LegalDocument::cached(),
                'navMenus' => Menu::cachedTree(),
            ];

            $currentData = $view->getData();

            if (! array_key_exists('affiliations', $currentData)) {
                $data['affiliations'] = Affiliation::cached();
            }

            if (! array_key_exists('paymentMethods', $currentData)) {
                $data['paymentMethods'] = PaymentMethod::cached();
            }

            $view->with($data);
        });

        TeamMember::saving(function ($member) {
            // Map 'role' from the form to 'designation' in the database
            if ($member->isDirty('role') || array_key_exists('role', $member->getAttributes())) {
                $member->designation = $member->getAttribute('role');
                unset($member->role);
            }

            if (request()->routeIs('admin.team-members.*') && in_array(request()->method(), ['POST', 'PUT', 'PATCH'])) {
                $member->is_guide = request()->boolean('is_guide');
                $member->featured = request()->boolean('featured');
                // The form sends 'is_active', but the DB column might be 'status' based on schema
                if (request()->has('is_active')) {
                    $member->status = request()->boolean('is_active');
                }
                if (request()->has('email')) {
                    $member->email = request()->input('email');
                }
                if (request()->has('phone')) {
                    $member->phone = request()->input('phone');
                }
            }

            // Unset is_active which is validated by the package controller but not in DB
            if (array_key_exists('is_active', $member->getAttributes())) {
                unset($member->is_active);
            }
        });
    }
}
