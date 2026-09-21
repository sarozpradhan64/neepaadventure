<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_blog_index_is_accessible_to_authenticated_users(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/blogs')
            ->assertOk();
    }

    public function test_admin_blog_create_page_renders_interactive_select_controls(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/blogs/create')
            ->assertOk()
            ->assertSee('role="combobox"', false)
            ->assertSee('aria-haspopup="listbox"', false)
            ->assertSee('Select a category', false);
    }
}
