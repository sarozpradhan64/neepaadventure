<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_user_management(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/users')
            ->assertOk();
    }

    public function test_authenticated_user_can_create_a_user(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->post('/admin/users', [
                'name' => 'Content Editor',
                'username' => 'editor',
                'email' => 'editor@example.com',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->assertRedirect('/admin/users');

        $this->assertDatabaseHas('users', [
            'username' => 'editor',
            'email' => 'editor@example.com',
        ]);
    }

    public function test_user_cannot_delete_their_own_account(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->delete('/admin/users/'.$user->id)
            ->assertRedirect('/admin/users')
            ->assertSessionHas('error', 'You cannot delete your own account.');

        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_user_can_update_their_profile(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put('/admin/profile', [
                'name' => 'Updated Name',
                'username' => $user->username,
                'email' => $user->email,
            ])
            ->assertRedirect('/admin/profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_user_must_provide_the_current_password_to_change_it(): void
    {
        $user = User::factory()->create(['password' => 'old-password']);

        $this->actingAs($user)
            ->put('/admin/profile/password', [
                'current_password' => 'incorrect-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->assertSessionHasErrors('current_password');

        $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
    }

    public function test_user_can_change_their_password(): void
    {
        $user = User::factory()->create(['password' => 'old-password']);

        $this->actingAs($user)
            ->put('/admin/profile/password', [
                'current_password' => 'old-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->assertRedirect('/admin/profile');

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }
}
