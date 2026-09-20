<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogCategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_blog_categories_index_is_accessible_to_authenticated_users(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/blog-categories')
            ->assertOk();
    }
}
