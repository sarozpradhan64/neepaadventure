<?php

namespace Tests\Feature;

use Blaze\AdminCore\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamSocialLinksTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_page_renders_social_links_for_team_profiles(): void
    {
        TeamMember::create([
            'name' => 'Tenzing Norgay',
            'designation' => 'Lead Expedition Guide',
            'bio' => 'Legendary mountaineer.',
            'facebook_url' => 'https://facebook.com/tenzing',
            'instagram_url' => 'https://instagram.com/tenzing',
            'linkedin_url' => 'https://linkedin.com/in/tenzing',
            'twitter_url' => 'https://x.com/tenzing',
            'email' => 'tenzing@example.com',
            'phone' => '+9779800000000',
            'sort_order' => 10,
            'status' => true,
            'is_guide' => true,
            'featured' => true,
        ]);

        $response = $this->get(route('team'));

        $response->assertStatus(200);
        $response->assertSee('Tenzing Norgay');
        $response->assertSee('Lead Expedition Guide');
        $response->assertSee('https://facebook.com/tenzing');
        $response->assertSee('https://instagram.com/tenzing');
        $response->assertSee('https://linkedin.com/in/tenzing');
        $response->assertSee('https://x.com/tenzing');
        $response->assertSee('mailto:tenzing@example.com');
        $response->assertSee('tel:+9779800000000');
    }
}
