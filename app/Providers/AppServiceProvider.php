<?php

namespace App\Providers;

use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\LegalDocument;
use Blaze\AdminCore\Models\Menu;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\TeamMember;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        $this->app->extend(\TailwindMerge\Contracts\TailwindMergeContract::class, function ($service, $app) {
            return \TailwindMerge\TailwindMerge::factory()
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
            $view->with([
                'contact' => ContactInformation::cached(),
                'socials' => SocialLink::cached(),
                'websiteSettings' => WebsiteSetting::cached(),
                'navLegalDocuments' => LegalDocument::cached(),
                'navMenus' => Menu::cachedTree(),
            ]);
        });

        TeamMember::saving(function ($member) {
            // Map 'role' from the form to 'designation' in the database
            if ($member->isDirty('role') || array_key_exists('role', $member->getAttributes())) {
                $member->designation = $member->getAttribute('role');
                unset($member->role);
            }

            // The package controller validates these, but they don't exist in the DB schema
            if (array_key_exists('twitter_url', $member->getAttributes())) {
                unset($member->twitter_url);
            }
            if (array_key_exists('instagram_url', $member->getAttributes())) {
                unset($member->instagram_url);
            }

            if (request()->routeIs('admin.team-members.*') && in_array(request()->method(), ['POST', 'PUT', 'PATCH'])) {
                $member->is_guide = request()->boolean('is_guide');
                $member->featured = request()->boolean('featured');
                // The form sends 'is_active', but the DB column might be 'status' based on schema
                if (request()->has('is_active')) {
                    $member->status = request()->boolean('is_active');
                }
            }

            // Unset is_active which is validated by the package controller but not in DB
            if (array_key_exists('is_active', $member->getAttributes())) {
                unset($member->is_active);
            }
        });
    }
}
