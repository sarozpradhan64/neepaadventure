<?php

use App\Models\User;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceExternalLinkTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_displays_external_link_beside_service_title_in_admin_services_index(): void
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
        $response->assertSee('Everest Base Camp Trek');
        $response->assertSee($service->url, false);
    }

    public function test_it_displays_external_link_in_admin_services_edit_page(): void
    {
        $user = User::factory()->create();
        $category = ServiceCategory::create([
            'name' => 'Trekking Tours',
            'slug' => 'trekking-tours',
            'status' => true,
            'sort_order' => 1,
        ]);

        $service = Service::create([
            'title' => 'Annapurna Circuit Trek',
            'slug' => 'annapurna-circuit-trek',
            'description' => 'Test description',
            'service_category_id' => $category->id,
            'status' => true,
            'is_featured' => false,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('admin.services.edit', $service));

        $response->assertOk();
        $response->assertSee($service->url, false);
    }
}
