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
}
