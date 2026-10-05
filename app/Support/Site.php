<?php

namespace App\Support;

use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\LegalDocument;
use Blaze\AdminCore\Models\Menu;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Site
{
    /**
     * Get all website settings as key-value array from cache.
     *
     * @return array<string, mixed>
     */
    public static function settings(): array
    {
        return WebsiteSetting::cached();
    }

    /**
     * Get a specific website setting by key with a default fallback.
     */
    public static function setting(string $key, mixed $default = null): mixed
    {
        return WebsiteSetting::get($key, $default);
    }

    /**
     * Get the contact information model from cache.
     */
    public static function contact(): ?ContactInformation
    {
        return ContactInformation::cached();
    }

    /**
     * Get active social links from cache.
     *
     * @return EloquentCollection<int, SocialLink>
     */
    public static function socials(): EloquentCollection
    {
        return SocialLink::cached();
    }

    /**
     * Get active legal documents from cache.
     *
     * @return EloquentCollection<int, LegalDocument>
     */
    public static function legalDocuments(): EloquentCollection
    {
        return LegalDocument::cached();
    }

    /**
     * Get active navigation menus tree from cache.
     *
     * @return EloquentCollection<int, Menu>
     */
    public static function menus(): EloquentCollection
    {
        return Menu::cachedTree();
    }

    /**
     * Flush the cache for a specific model class, or all cached models.
     *
     * @param  class-string|null  $modelClass
     */
    public static function flush(?string $modelClass = null): void
    {
        if ($modelClass !== null && method_exists($modelClass, 'flushCache')) {
            $modelClass::flushCache();

            return;
        }

        WebsiteSetting::flushCache();
        ContactInformation::flushCache();
        SocialLink::flushCache();
        LegalDocument::flushCache();
        Menu::flushCache();
    }
}
