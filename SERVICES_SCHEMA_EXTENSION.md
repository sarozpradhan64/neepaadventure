# Services Schema Extension — neepaadventure

> **Pattern:** Use project-level `alter` migrations to add site-specific columns to `blaze/admin-core` tables without modifying the package itself.

---

## Current `services` Table Schema (admin-core owned)

| Column               | Type         | Notes                              |
| -------------------- | ------------ | ---------------------------------- |
| `id`                 | bigint       |                                    |
| `service_category_id`| bigint (FK)  | nullable → `service_categories`    |
| `title`              | string       |                                    |
| `slug`               | string       | unique                             |
| `short_description`  | text         | nullable                           |
| `description`        | longText      |                                    |
| `featured_image`     | string(500)  | nullable                           |
| `status`             | boolean      |                                    |
| `is_featured`        | boolean      |                                    |
| `sort_order`         | integer      |                                    |
| `created_by`         | bigint (FK)  | nullable → `users`                 |
| `updated_by`         | bigint (FK)  | nullable → `users`                 |
| `created_at`         | timestamp    |                                    |
| `updated_at`         | timestamp    |                                    |

> **Do NOT modify** `packages/blaze/admin-core/database/migrations/` for site-specific needs.

---

## TODO: Identify Site-Specific Fields Needed

Decide which neepaadventure-specific columns to add to `services`. Examples to consider:

- [ ] `duration` — string, e.g. "3 Days / 2 Nights"
- [ ] `price_from` — decimal(10,2), starting price
- [ ] `difficulty_level` — enum: easy / moderate / hard / extreme
- [ ] `includes` — json, list of inclusions
- [ ] `excludes` — json, list of exclusions
- [ ] `max_group_size` — integer
- [ ] `best_season` — string or json

---

## Implementation Steps

### 1. Create the alter migration (in project, not package)

```bash
php artisan make:migration add_adventure_fields_to_services_table --no-interaction
```

```php
// database/migrations/xxxx_add_adventure_fields_to_services_table.php

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('description');
            $table->decimal('price_from', 10, 2)->nullable()->after('duration');
            $table->enum('difficulty_level', ['easy', 'moderate', 'hard', 'extreme'])->nullable()->after('price_from');
            $table->json('includes')->nullable()->after('difficulty_level');
            $table->json('excludes')->nullable()->after('includes');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['duration', 'price_from', 'difficulty_level', 'includes', 'excludes']);
        });
    }
};
```

### 2. Extend the Service model locally (only if casts/accessors needed)

```php
// app/Models/Service.php
namespace App\Models;

use Blaze\AdminCore\Models\Service as BaseService;

class Service extends BaseService
{
    protected $casts = [
        // inherits: status (bool), is_featured (bool)
        'includes' => 'array',
        'excludes' => 'array',
    ];
}
```

> The base model uses `$guarded = []`, so new columns are automatically fillable — no model override needed unless you need casts or custom accessors.

### 3. Handle admin form UI (pick one approach)

**Option A — Publish & override the package view (recommended for inline editing):**

Copy `admin-core::services.form` to:
```
resources/views/vendor/admin-core/services/form.blade.php
```
Then add the extra field inputs in that file.

**Option B — Supplemental project-level form:**

Add a project admin route that renders an extra "Adventure Details" section for each service, keeping the admin-core form untouched.

---

## Key Rules

- **Never** add generic admin-core columns (`title`, `slug`, `status`, etc.) again — they already exist.
- **Never** edit `packages/blaze/admin-core/database/migrations/` for project-specific fields.
- **Always** run `php artisan migrate` after adding the alter migration.
- The admin-core `ServiceController` remains unchanged — it handles base fields; project handles extras.
