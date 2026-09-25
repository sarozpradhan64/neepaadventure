<?php

namespace Tests\Feature;

use App\Models\User;
use Blaze\AdminCore\Models\Project;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_manage_tags(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.tags.manage'))
            ->assertOk()
            ->assertSee('Manage Tags');
    }

    public function test_authenticated_users_can_create_and_rename_unused_tags(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.tags.store'), ['name' => 'Outdoor Adventures'])
            ->assertRedirect(route('admin.tags.manage'));

        $tag = Tag::where('slug', 'outdoor-adventures')->firstOrFail();

        $this->actingAs($user)
            ->put(route('admin.tags.update', $tag), ['name' => 'Mountain Adventures'])
            ->assertRedirect(route('admin.tags.manage'));

        $this->assertDatabaseHas('tags', [
            'id' => $tag->id,
            'name' => 'Mountain Adventures',
            'slug' => 'mountain-adventures',
        ]);
    }

    public function test_tag_edit_page_is_available_from_the_tags_index(): void
    {
        $user = User::factory()->create();
        $tag = Tag::create(['name' => 'Outdoor', 'slug' => 'outdoor']);

        $this->actingAs($user)
            ->get(route('admin.tags.edit', $tag))
            ->assertOk()
            ->assertSee('Edit Tag')
            ->assertSee(route('admin.tags.update', $tag), false);
    }

    public function test_tags_in_use_cannot_be_deleted(): void
    {
        $user = User::factory()->create();
        $tag = Tag::create([
            'name' => 'Used Tag',
            'slug' => 'used-tag',
            'usage_count' => 1,
        ]);

        $this->actingAs($user)
            ->delete(route('admin.tags.destroy', $tag))
            ->assertRedirect()
            ->assertSessionHas('error');

        $this->assertDatabaseHas('tags', ['id' => $tag->id]);
    }

    public function test_tag_detail_page_lists_the_services_and_projects_using_the_tag(): void
    {
        $user = User::factory()->create();
        $tag = Tag::create(['name' => 'Featured', 'slug' => 'featured']);
        $service = Service::create([
            'title' => 'Guided Trekking',
            'slug' => 'guided-trekking',
            'description' => 'Guided trekking service',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 0,
        ]);
        $project = Project::create([
            'title' => 'Mountain Conservation',
            'slug' => 'mountain-conservation',
            'project_status' => 'ongoing',
            'description' => 'Mountain conservation project',
            'status' => true,
            'is_featured' => false,
            'sort_order' => 0,
        ]);

        $service->tags()->attach($tag);
        $project->tags()->attach($tag);

        $this->actingAs($user)
            ->get(route('admin.tags.show', $tag))
            ->assertOk()
            ->assertSee('Guided Trekking')
            ->assertSee('Mountain Conservation')
            ->assertSee(route('admin.services.edit', $service), false)
            ->assertSee(route('admin.projects.edit', $project), false);
    }
}
