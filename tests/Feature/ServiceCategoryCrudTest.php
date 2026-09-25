<?php

use App\Models\User;
use Blaze\AdminCore\Models\ServiceCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ServiceCategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_service_category_with_a_parent_rich_text_description_and_thumbnail(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $parent = ServiceCategory::create([
            'name' => 'Outdoor Adventures',
            'slug' => 'outdoor-adventures',
            'status' => true,
            'sort_order' => 0,
        ]);

        $response = $this->actingAs($user)->post(route('admin.service-categories.store'), [
            'name' => 'Trekking',
            'parent_id' => $parent->id,
            'description' => '<p>Guided trekking tours.</p>',
            'thumbnail' => UploadedFile::fake()->image('trekking.jpg'),
            'status' => '1',
        ]);

        $response->assertRedirect(route('admin.service-categories.index'));

        $category = ServiceCategory::where('name', 'Trekking')->firstOrFail();

        $this->assertTrue($category->parent->is($parent));
        $this->assertSame('<p>Guided trekking tours.</p>', $category->description);
        $this->assertNotNull($category->thumbnail);

        $this->assertTrue(Storage::disk('public')->exists($category->thumbnail));
    }

    public function test_it_does_not_allow_a_service_category_to_be_its_own_parent(): void
    {
        $user = User::factory()->create();
        $category = ServiceCategory::create([
            'name' => 'Outdoor Adventures',
            'slug' => 'outdoor-adventures',
            'status' => true,
            'sort_order' => 0,
        ]);

        $this->actingAs($user)
            ->put(route('admin.service-categories.update', $category), [
                'name' => $category->name,
                'parent_id' => $category->id,
            ])
            ->assertSessionHasErrors('parent_id');
    }
}
