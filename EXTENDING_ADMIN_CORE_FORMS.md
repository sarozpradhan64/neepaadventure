# Extending Admin-Core Forms (Form Builder Pattern)

This project uses `blaze/admin-core`, a decoupled package. When you need to add **site-specific fields** (e.g., `duration`, `maximum_altitude`, `inclusions`) to a core model like `Service`, do **not** modify the admin-core package directly.

Instead, we use the **Form Builder Extension Pattern** utilizing `AdminCoreConfiguration`.

## How It Works

1. **Database:** You create a project-level `alter` migration to add the columns to the existing core table.
2. **Configuration Hook:** You define the fields in `app/Providers/AdminCoreConfiguration.php`.
3. **Automatic UI:** The `admin-core` package automatically reads this configuration and renders the appropriate input fields in the create/edit forms, handles validation, and saves the data.

---

## Step-by-Step Guide to Adding a New Field

### 1. Create the Alter Migration
Generate a migration in the project (not the package):
```bash
php artisan make:migration add_new_fields_to_services_table --table=services
```

Define your site-specific columns:
```php
public function up(): void
{
    Schema::table('services', function (Blueprint $table) {
        $table->string('duration')->nullable()->after('description');
        // 'richtext' fields should be longText
        $table->longText('inclusions')->nullable(); 
    });
}
```
Run `php artisan migrate`.

### 2. Register the Field in Configuration
Open `app/Providers/AdminCoreConfiguration.php` and add your fields to the `serviceFormFields()` method.

```php
use Blaze\AdminCore\Support\ServiceFormField;

public function serviceFormFields(): array
{
    return [
        ServiceFormField::make(
            name: 'duration',
            type: 'text', // Supported: text, number, textarea, richtext, select, checkbox, file
            label: 'Duration',
            placeholder: 'e.g. 3 Days',
            validationRule: 'nullable|string|max:255',
        ),
        ServiceFormField::make(
            name: 'difficulty_level',
            type: 'select',
            label: 'Difficulty Level',
            validationRule: 'nullable|in:easy,moderate,hard',
            options: [
                'easy'     => 'Easy',
                'moderate' => 'Moderate',
                'hard'     => 'Hard',
            ],
        ),
        ServiceFormField::make(
            name: 'inclusions',
            type: 'richtext',
            label: 'Inclusions',
            validationRule: 'nullable|string',
        ),
    ];
}
```

### Supported Field Types
The `admin-core` partial (`_extra_fields.blade.php`) natively supports rendering the following types:
- `text`, `email`, `url`, `date` (Standard text inputs)
- `number` (Numeric input)
- `textarea` (Standard multiline text)
- `richtext` (Quill/Rich text editor)
- `select` (Dropdown, requires `options` array mapping `value => label`)
- `checkbox` (Boolean toggle switch)
- `file` (File upload, stored in `services` disk automatically)

## Summary of Responsibilities

* **`packages/blaze/admin-core`**: Holds the base migrations, base models, base controllers, and the UI rendering logic (`_extra_fields.blade.php`). **Never modify its migrations for site-specific data.**
* **`app/Providers/AdminCoreConfiguration.php`**: Acts as the bridge, injecting project-specific form fields into the core package.
* **`database/migrations/` (Project)**: Holds the `alter` migrations adding site-specific columns to the core tables.
