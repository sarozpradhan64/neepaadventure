<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AdminCacheTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_clear_cache(): void
    {
        $response = $this->post(route('admin.cache.clear'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_user_can_clear_cache(): void
    {
        $user = User::factory()->create();

        Cache::put('test_key', 'test_value', 60);
        $this->assertEquals('test_value', Cache::get('test_key'));

        $response = $this->actingAs($user)->from(route('admin.dashboard'))->post(route('admin.cache.clear'));

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('success', 'Application cache cleared successfully.');
        $this->assertNull(Cache::get('test_key'));
    }
}
