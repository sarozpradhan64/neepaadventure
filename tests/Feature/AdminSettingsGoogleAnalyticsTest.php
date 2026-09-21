<?php

namespace Tests\Feature;

use App\Models\User;
use Blaze\AdminCore\Models\WebsiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSettingsGoogleAnalyticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_save_and_render_google_analytics_tracking_code(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('admin.settings.seo.update'), [
                'google_analytics' => 'G-ABC123DEF4',
            ])
            ->assertSessionHas('success');

        $this->assertSame('G-ABC123DEF4', WebsiteSetting::where('key', 'google_analytics')->value('value'));

        $this->get('/')
            ->assertOk()
            ->assertSee("gtag('config', 'G-ABC123DEF4')", false)
            ->assertSee('https://www.googletagmanager.com/gtag/js?id=G-ABC123DEF4', false);
    }
}
