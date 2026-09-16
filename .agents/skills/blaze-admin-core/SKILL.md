---
name: blaze-admin-core
description: >-
    Use this skill whenever working with, extending, integrating, or reusing the
    blaze/admin-core package — the shared admin panel for all Blaze-managed Laravel
    websites. Covers installation, namespace conventions, routing, models, views,
    extending for site-specific features, and the Git submodule workflow.
---

# Blaze Admin Core — Skill Guide

The `blaze/admin-core` package is a **reusable Laravel admin panel** extracted from the Blaze Admin project and hosted at [github.com/sarozpradhan64/blaze-admin-core](https://github.com/sarozpradhan64/blaze-admin-core).

It provides a ready-made, authentication-protected admin dashboard with core CMS features that every website needs (Team, Testimonials, Gallery, Enquiries, Contact, Settings, SEO). Each individual site repo only adds its own domain-specific resources on top.

---

## 1. Package Overview

| Aspect                | Detail                                                 |
| --------------------- | ------------------------------------------------------ |
| **Package Name**      | `blaze/admin-core`                                     |
| **Namespace**         | `Blaze\AdminCore`                                      |
| **View Namespace**    | `admin-core::`                                         |
| **Route Prefix**      | `/admin`                                               |
| **Route Name Prefix** | `admin.`                                               |
| **GitHub Repo**       | https://github.com/sarozpradhan64/blaze-admin-core     |
| **ServiceProvider**   | `Blaze\AdminCore\Providers\AdminCoreServiceProvider`   |
| **Auto-discovered**   | Yes — via `extra.laravel.providers` in `composer.json` |

---

## 2. What's Included (Core Modules)

### Models (`Blaze\AdminCore\Models\*`)

| Model                | Table                 | Purpose                                    |
| -------------------- | --------------------- | ------------------------------------------ |
| `ContactInformation` | `contact_information` | Company address, phone, email, maps        |
| `SocialLink`         | `social_links`        | Social media links with icon + sort order  |
| `WebsiteSetting`     | `website_settings`    | Key-value CMS settings (logo, hero, about) |
| `HomepageSection`    | `homepage_sections`   | Flexible homepage content blocks           |
| `SeoMetadata`        | `seo_metadata`        | Polymorphic SEO tags for any model         |
| `Testimonial`        | `testimonials`        | Client testimonials with rating            |
| `TeamMember`         | `team_members`        | Staff profiles                             |
| `GalleryAlbum`       | `gallery_albums`      | Photo/video album groupings                |
| `GalleryItem`        | `gallery_items`       | Individual gallery photos/videos           |
| `Download`           | `downloads`           | Downloadable files (PDFs, brochures)       |
| `Enquiry`            | `enquiries`           | Lead enquiries from public forms           |
| `ContactMessage`     | `contact_messages`    | Contact form submissions                   |
| `SpamLog`            | `spam_logs`           | Spam detection audit trail                 |
| `Project`            | `projects`            | Portfolio projects                         |
| `ProjectCategory`    | `project_categories`  | Categories for projects                    |
| `ProjectImage`       | `project_images`      | Gallery images for a specific project      |
| `ProjectVideo`       | `project_videos`      | Video links for a specific project         |
| `ProjectStatistic`   | `project_statistics`  | Key metrics/stats for a project            |
| `Service`            | `services`            | Offered services                           |
| `ServiceCategory`    | `service_categories`  | Categories for services                    |
| `ServiceFeature`     | `service_features`    | Features/highlights for a service          |
| `AuditLog`           | `audit_logs`          | Generic tracking logs                      |
| `Media`              | `media`               | Shared media attachments                   |
| `Page`               | `pages`               | Custom static pages                        |

### Controllers (`Blaze\AdminCore\Http\Controllers\*`)

- `AuthController` — Login / Logout
- `WebsiteSettingController` — Settings (homepage, about, SEO tabs)
- `SeoSettingController` — SEO metadata management
- `CompanyInfoController` — Company contact + social links
- `TeamMemberController` — Team CRUD
- `TestimonialController` — Testimonials CRUD
- `GalleryAlbumController` — Gallery albums CRUD
- `GalleryItemController` — Gallery items CRUD
- `DownloadController` — Downloads CRUD
- `EnquiryController` — Enquiries viewer (read-only from admin)
- `ContactMessageController` — Contact messages viewer
- `ProjectController` — Projects CRUD
- `ProjectCategoryController` — Project Categories CRUD
- `ProjectImageController` — Project Images CRUD
- `ProjectVideoController` — Project Videos CRUD
- `ProjectStatisticController` — Project Statistics CRUD
- `ServiceController` — Services CRUD
- `ServiceCategoryController` — Service Categories CRUD
- `ServiceFeatureController` — Service Features CRUD
- `ReorderController` — Universal drag-to-reorder endpoint

### Routes (all under `/admin`)

| URL                              | Name                           | Access     |
| -------------------------------- | ------------------------------ | ---------- |
| `GET /admin/login`               | `admin.login`                  | Guest only |
| `POST /admin/login`              | —                              | Guest only |
| `POST /admin/logout`             | `admin.logout`                 | Auth       |
| `GET /admin/`                    | `admin.dashboard`              | Auth       |
| `GET /admin/settings`            | `admin.settings.index`         | Auth       |
| `GET /admin/company-info`        | `admin.company-info.index`     | Auth       |
| `GET /admin/team-members`        | `admin.team-members.index`     | Auth       |
| `GET /admin/testimonials`        | `admin.testimonials.index`     | Auth       |
| `GET /admin/gallery-albums`      | `admin.gallery-albums.index`   | Auth       |
| `GET /admin/downloads`           | `admin.downloads.index`        | Auth       |
| `GET /admin/enquiries`           | `admin.enquiries.index`        | Auth       |
| `GET /admin/contact-messages`    | `admin.contact-messages.index` | Auth       |
| `GET /admin/projects`            | `admin.projects.index`         | Auth       |
| `GET /admin/services`            | `admin.services.index`         | Auth       |
| `POST /admin/reorder/{resource}` | `admin.reorder`                | Auth       |

### Views (all via `admin-core::` namespace)

```
admin-core::auth.login
admin-core::dashboard
admin-core::website_settings.index
admin-core::seo_settings.index
admin-core::company_info.index
admin-core::team_members.index / form
admin-core::testimonials.index / form
admin-core::gallery_albums.index / form
admin-core::gallery_items.index / form
admin-core::downloads.index / form
admin-core::enquiries.index / show
admin-core::contact_messages.index / show
admin-core::projects.index / form
admin-core::project_categories.index / form
admin-core::services.index / form
admin-core::service_categories.index / form
```

---

## 3. Installing the Package in a New Project

### Method A — Git Submodule (Recommended for active development)

```bash
# 1. Add the package as a git submodule
git submodule add https://github.com/sarozpradhan64/blaze-admin-core.git packages/blaze/admin-core

# 2. Register the local path repository in composer.json
composer config repositories.blaze path packages/blaze/admin-core

# 3. Require the package
composer require blaze/admin-core "*@dev"
```

> **Important:** When cloning a site repo that uses this submodule, always run:
>
> ```bash
> git submodule update --init --recursive
> ```

### Method B — Direct Composer (when published to Packagist)

```bash
composer require blaze/admin-core
```

---

## 4. Global Data Available in All Views

The `AppServiceProvider` must share the core model data globally using a View composer. Every new site using this package should configure this in `app/Providers/AppServiceProvider.php`:

```php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

public function boot(): void
{
    if (Schema::hasTable('contact_information') && Schema::hasTable('social_links')) {
        View::composer('*', function ($view) {
            // Core package models
            $contact        = \Blaze\AdminCore\Models\ContactInformation::first();
            $socials        = \Blaze\AdminCore\Models\SocialLink::where('status', true)->orderBy('sort_order')->get();
            $websiteSettings = \Blaze\AdminCore\Models\WebsiteSetting::pluck('value', 'key')->toArray();

            // Site-specific / Nav models
            $navServices = \Blaze\AdminCore\Models\Service::where('status', true)->orderBy('sort_order')->take(5)->get();
            $navProjects = \Blaze\AdminCore\Models\Project::where('status', true)->orderBy('sort_order')->take(4)->get();

            $view->with(compact('contact', 'socials', 'websiteSettings', 'navServices', 'navProjects'));
        });
    }
}
```

> **Rule:** NEVER query `ContactInformation`, `SocialLink`, or `WebsiteSetting` directly inside a Blade `@php` block or controller just to pass it to a layout. Use the View composer above.

---

## 5. Extending the Admin for a New Site

Each site adds its own domain-specific admin modules on top. The pattern is:

### Step 1 — Add site-specific routes in the app's `routes/web.php`

```php
// Site-specific admin routes (added ON TOP of the blaze/admin-core routes)
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    // Example: Trekking website unique features
    Route::resource('treks', \App\Http\Controllers\Admin\TrekController::class);
    Route::resource('itineraries', \App\Http\Controllers\Admin\ItineraryController::class);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->except(['create', 'store']);
});
```

### Step 2 — Add site-specific controllers in `app/Http/Controllers/Admin/`

Use `App\Http\Controllers\Admin` namespace (NOT `Blaze\AdminCore`) for these:

```php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class TrekController extends \App\Http\Controllers\Controller
{
    public function index() { ... }
    public function create() { ... }
    public function store(Request $request) { ... }
    // ...
}
```

### Step 3 — Site-specific views in `resources/views/admin/`

```
resources/views/admin/treks/index.blade.php
resources/views/admin/treks/form.blade.php
resources/views/admin/bookings/index.blade.php
```

Reference the shared admin layout which is already provided by the package:

```blade
{{-- resources/views/admin/treks/index.blade.php --}}
<x-admin-layout> {{-- or whatever layout the package provides --}}
    ...
</x-admin-layout>
```

---

## 6. Updating the Package Across All Sites

When you fix a bug or add a feature in `blaze/admin-core`:

```bash
# In the blaze-admin-core repo
git commit -am "Fix: Update enquiry status workflow"
git push origin main

# In EACH site repo — pull the latest changes
git submodule update --remote packages/blaze/admin-core
git commit -am "chore: Update admin-core to latest"
git push
```

---

## 7. Namespace Reference (Quick Copy-Paste)

```php
// Models
use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\SocialLink;
use Blaze\AdminCore\Models\WebsiteSetting;
use Blaze\AdminCore\Models\HomepageSection;
use Blaze\AdminCore\Models\SeoMetadata;
use Blaze\AdminCore\Models\Testimonial;
use Blaze\AdminCore\Models\TeamMember;
use Blaze\AdminCore\Models\GalleryAlbum;
use Blaze\AdminCore\Models\GalleryItem;
use Blaze\AdminCore\Models\Download;
use Blaze\AdminCore\Models\Enquiry;
use Blaze\AdminCore\Models\ContactMessage;
use Blaze\AdminCore\Models\SpamLog;
use Blaze\AdminCore\Models\Project;
use Blaze\AdminCore\Models\ProjectCategory;
use Blaze\AdminCore\Models\ProjectImage;
use Blaze\AdminCore\Models\ProjectVideo;
use Blaze\AdminCore\Models\ProjectStatistic;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Blaze\AdminCore\Models\ServiceFeature;
use Blaze\AdminCore\Models\AuditLog;
use Blaze\AdminCore\Models\Media;
use Blaze\AdminCore\Models\Page;

// Controllers (if extending or calling)
use Blaze\AdminCore\Http\Controllers\AuthController;
use Blaze\AdminCore\Http\Controllers\WebsiteSettingController;
use Blaze\AdminCore\Http\Controllers\CompanyInfoController;
use Blaze\AdminCore\Http\Controllers\TeamMemberController;
use Blaze\AdminCore\Http\Controllers\TestimonialController;
use Blaze\AdminCore\Http\Controllers\GalleryAlbumController;
use Blaze\AdminCore\Http\Controllers\GalleryItemController;
use Blaze\AdminCore\Http\Controllers\DownloadController;
use Blaze\AdminCore\Http\Controllers\EnquiryController;
use Blaze\AdminCore\Http\Controllers\ContactMessageController;
use Blaze\AdminCore\Http\Controllers\ProjectController;
use Blaze\AdminCore\Http\Controllers\ServiceController;
use Blaze\AdminCore\Http\Controllers\ReorderController;
```

---

## 8. Key Rules for Agents

1. **NEVER use `App\Models\...`** for any model that belongs to this package. Always use `Blaze\AdminCore\Models\...`.
2. **NEVER hardcode model queries** (`\Blaze\AdminCore\Models\ContactInformation::first()`) inside Blade views or layout components. Use the `View::composer` in `AppServiceProvider`.
3. **NEVER add** generic/shared admin features (Projects, Services, TeamMembers, Settings, Gallery, etc.) directly into a site's `app/` folder. They are now part of the `blaze/admin-core` package.
4. **DO add** truly site-specific, non-reusable resources (e.g., `Treks`, `Bookings` for a trekking site) to the site's own `app/Http/Controllers/Admin/` and `resources/views/admin/`.
5. **DO run** `git submodule update --init --recursive` after cloning any site that uses this package.
6. When referencing package views in controllers, always use the `admin-core::` view namespace prefix: `view('admin-core::dashboard')`.
