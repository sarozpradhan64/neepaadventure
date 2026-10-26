<?php

namespace Tests\Feature;

use App\Models\User;
use Blaze\AdminCore\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactPageFaqTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_only_active_contact_faqs(): void
    {
        $contactFaq = Faq::create([
            'question' => 'How difficult is the Everest Base Camp trek?',
            'answer' => '<p>It is moderately challenging, requiring good aerobic fitness.</p>',
            'status' => true,
            'is_contact_page' => true,
            'sort_order' => 1,
        ]);

        $nonContactFaq = Faq::create([
            'question' => 'General Non-Contact Trek Question?',
            'answer' => '<p>This should only be for services or blogs.</p>',
            'status' => true,
            'is_contact_page' => false,
            'sort_order' => 2,
        ]);

        $inactiveContactFaq = Faq::create([
            'question' => 'Secret Inactive Trek Question?',
            'answer' => '<p>This should not be displayed.</p>',
            'status' => false,
            'is_contact_page' => true,
            'sort_order' => 3,
        ]);

        $response = $this->get(route('contact'));

        $response->assertStatus(200);
        $response->assertSee('How difficult is the Everest Base Camp trek?');
        $response->assertSee('It is moderately challenging, requiring good aerobic fitness.', false);
        $response->assertDontSee('General Non-Contact Trek Question?');
        $response->assertDontSee('Secret Inactive Trek Question?');
    }

    public function test_admin_can_update_faq_is_contact_page_flag(): void
    {
        $user = User::factory()->create();

        $faq = Faq::create([
            'question' => 'Can we customize our itinerary?',
            'answer' => '<p>Yes, all treks can be tailored.</p>',
            'status' => true,
            'is_contact_page' => false,
            'sort_order' => 1,
        ]);

        $this->actingAs($user)
            ->get(route('admin.faqs.edit', $faq))
            ->assertOk()
            ->assertSee('name="is_contact_page"', false)
            ->assertSee('Display in Contact Page');

        $this->actingAs($user)
            ->put(route('admin.faqs.update', $faq), [
                'question' => 'Can we customize our itinerary?',
                'answer' => '<p>Yes, all treks can be tailored.</p>',
                'status' => '1',
                'is_contact_page' => '1',
            ])
            ->assertRedirect(route('admin.faqs.index'));

        $this->assertTrue($faq->fresh()->is_contact_page);

        // Update again with checkbox unchecked
        $this->actingAs($user)
            ->put(route('admin.faqs.update', $faq), [
                'question' => 'Can we customize our itinerary?',
                'answer' => '<p>Yes, all treks can be tailored.</p>',
                'status' => '1',
            ])
            ->assertRedirect(route('admin.faqs.index'));

        $this->assertFalse($faq->fresh()->is_contact_page);
    }

    public function test_admin_can_filter_faqs_by_status_placement_usage_and_search(): void
    {
        $user = User::factory()->create();

        $contactFaq = Faq::create([
            'question' => 'How to prepare for Annapurna?',
            'answer' => 'Aerobic cardio training.',
            'status' => true,
            'is_contact_page' => true,
            'usage_count' => 3,
            'sort_order' => 1,
        ]);

        $draftFaq = Faq::create([
            'question' => 'What is the refund policy?',
            'answer' => 'Full refund within 30 days.',
            'status' => false,
            'is_contact_page' => false,
            'usage_count' => 0,
            'sort_order' => 2,
        ]);

        // Filter by placement: contact_page=yes
        $this->actingAs($user)
            ->get(route('admin.faqs.index', ['contact_page' => 'yes']))
            ->assertOk()
            ->assertSee('How to prepare for Annapurna?')
            ->assertDontSee('What is the refund policy?');

        // Filter by status: draft
        $this->actingAs($user)
            ->get(route('admin.faqs.index', ['status' => 'draft']))
            ->assertOk()
            ->assertSee('What is the refund policy?')
            ->assertDontSee('How to prepare for Annapurna?');

        // Filter by usage: unused
        $this->actingAs($user)
            ->get(route('admin.faqs.index', ['usage' => 'unused']))
            ->assertOk()
            ->assertSee('What is the refund policy?')
            ->assertDontSee('How to prepare for Annapurna?');

        // Search by keyword in answer
        $this->actingAs($user)
            ->get(route('admin.faqs.index', ['search' => 'cardio']))
            ->assertOk()
            ->assertSee('How to prepare for Annapurna?')
            ->assertDontSee('What is the refund policy?');
    }
}
