<?php

namespace Tests\Feature;

use App\Models\User;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceFeaturedFlagTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_form_does_not_display_is_featured_toggle_when_service_featured_is_disabled(): void
    {
        $user = User::factory()->create();
        $category = ServiceCategory::create([
            'name' => 'Trekking Tours',
            'slug' => 'trekking-tours',
            'status' => true,
            'sort_order' => 1,
        ]);

        $service = Service::create([
            'title' => 'Everest Base Camp Trek',
            'slug' => 'everest-base-camp-trek',
            'description' => 'Test description',
            'service_category_id' => $category->id,
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('admin.services.edit', $service));

        $response->assertOk();
        $response->assertDontSee('name="is_featured"', false);
        $response->assertDontSee('<span>Featured</span>', false);
        // Features tab (itinerary) should still be present
        $response->assertSee('Save Features');
        $response->assertSee('Gallery / Cover Images');
    }

    public function test_services_index_does_not_display_featured_column_when_disabled(): void
    {
        $user = User::factory()->create();
        $category = ServiceCategory::create([
            'name' => 'Trekking Tours',
            'slug' => 'trekking-tours',
            'status' => true,
            'sort_order' => 1,
        ]);

        $service = Service::create([
            'title' => 'Everest Base Camp Trek',
            'slug' => 'everest-base-camp-trek',
            'description' => 'Test description',
            'service_category_id' => $category->id,
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('admin.services.index'));

        $response->assertOk();
        $response->assertDontSee('sort_by=is_featured', false);
    }

    public function test_it_updates_service_without_is_featured_input(): void
    {
        $user = User::factory()->create();
        $category = ServiceCategory::create([
            'name' => 'Trekking Tours',
            'slug' => 'trekking-tours',
            'status' => true,
            'sort_order' => 1,
        ]);

        $service = Service::create([
            'title' => 'Everest Base Camp Trek',
            'slug' => 'everest-base-camp-trek',
            'description' => 'Original description',
            'service_category_id' => $category->id,
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)->put(route('admin.services.update', $service), [
            'title' => 'Updated Everest Base Camp Trek',
            'description' => 'Updated description',
            'service_category_id' => $category->id,
            'status' => '1',
        ]);

        $response->assertRedirect(route('admin.services.index'));
        $service->refresh();
        $this->assertSame('Updated Everest Base Camp Trek', $service->title);
        $this->assertFalse($service->is_featured);
    }
}
