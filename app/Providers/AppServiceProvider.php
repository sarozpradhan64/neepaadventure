<?php

namespace App\Providers;

use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\LegalDocument;
use Blaze\AdminCore\Models\Project;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
            $navLegalDocuments = collect();

            if (Schema::hasTable('contact_information')) {
                $contact = ContactInformation::first();
            }

            if (Schema::hasTable('social_links')) {
                $socials = SocialLink::where('status', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (Schema::hasTable('website_settings')) {
                $websiteSettings = WebsiteSetting::pluck('value', 'key')->toArray();
            }

            if (Schema::hasTable('services')) {
                $navServices = Service::where('status', true)
                    ->orderBy('sort_order')
                    ->take(5)
                    ->get();
            }

            if (Schema::hasTable('projects')) {
                $navProjects = Project::where('status', true)
                    ->orderBy('sort_order')
                    ->take(4)
                    ->get();
            }
            
            if (Schema::hasTable('legal_documents')) {
                $navLegalDocuments = LegalDocument::where('status', true)
                    ->latest()
                    ->get();
            }

            $view->with(compact(
                'contact',
                'socials',
                'websiteSettings',
                'navServices',
                'navProjects',
                'navLegalDocuments',
            ));
        });

        \Blaze\AdminCore\Models\TeamMember::saving(function ($member) {
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
