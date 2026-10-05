<?php

use App\Support\Site;
use Blaze\AdminCore\Models\ContactInformation;
use Illuminate\Support\Collection;

if (! function_exists('site_setting')) {
    /**
     * Get a website setting value by key.
     */
    function site_setting(string $key, mixed $default = null): mixed
    {
        return Site::setting($key, $default);
    }
}

if (! function_exists('site_settings')) {
    /**
     * Get all website settings.
     *
     * @return array<string, mixed>
     */
    function site_settings(): array
    {
        return Site::settings();
    }
}

if (! function_exists('site_contact')) {
    /**
     * Get the company contact information model.
     */
    function site_contact(): ?ContactInformation
    {
        return Site::contact();
    }
}

if (! function_exists('site_socials')) {
    /**
     * Get the list of active social links.
     */
    function site_socials(): Collection
    {
        return Site::socials();
    }
}

if (! function_exists('site_menus')) {
    /**
     * Get the navigation menu tree.
     */
    function site_menus(): Collection
    {
        return Site::menus();
    }
}
