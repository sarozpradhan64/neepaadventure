<?php

namespace App\Providers;

use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\Project;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $contact = null;
            $socials = collect();
            $websiteSettings = [];
            $navServices = collect();
            $navProjects = collect();

            if (Schema::hasTable('contact_information')) {
                $contact = \Blaze\AdminCore\Models\ContactInformation::first();
            }

            if (Schema::hasTable('social_links')) {
                $socials = \Blaze\AdminCore\Models\SocialLink::where('status', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (Schema::hasTable('website_settings')) {
                $websiteSettings = \Blaze\AdminCore\Models\WebsiteSetting::pluck('value', 'key')->toArray();
            }

            if (Schema::hasTable('services')) {
                $navServices = \Blaze\AdminCore\Models\Service::where('status', true)
                    ->orderBy('sort_order')
                    ->take(5)
                    ->get();
            }

            if (Schema::hasTable('projects')) {
                $navProjects = \Blaze\AdminCore\Models\Project::where('status', true)
                    ->orderBy('sort_order')
                    ->take(4)
                    ->get();
            }

            $view->with(compact(
                'contact',
                'socials',
                'websiteSettings',
                'navServices',
                'navProjects',
            ));
        });
    }
}
