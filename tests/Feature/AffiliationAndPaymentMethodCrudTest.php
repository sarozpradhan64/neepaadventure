<?php

namespace Tests\Feature;

use App\Models\User;
use Blaze\AdminCore\Models\Affiliation;
use Blaze\AdminCore\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AffiliationAndPaymentMethodCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_affiliations_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.affiliations.index'))
            ->assertOk()
            ->assertSee('Our Affiliations')
            ->assertSee('Add Affiliation');
    }

    public function test_user_can_create_affiliation(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('logo.png');

        $response = $this->actingAs($user)
            ->post(route('admin.affiliations.store'), [
                'name' => 'TAAN Nepal',
                'logo' => $file,
                'link' => 'https://taan.org.np',
                'status' => '1',
            ]);

        $response->assertRedirect(route('admin.affiliations.index'));

        $this->assertDatabaseHas('affiliations', [
            'name' => 'TAAN Nepal',
            'link' => 'https://taan.org.np',
            'status' => true,
        ]);
    }

    public function test_user_can_toggle_affiliation_visibility(): void
    {
        $user = User::factory()->create();
        $affiliation = Affiliation::create([
            'name' => 'TAAN',
            'logo' => 'affiliation/taan.png',
            'status' => true,
            'sort_order' => 1,
        ]);

        $this->actingAs($user)
            ->patch(route('admin.affiliations.toggle', $affiliation))
            ->assertRedirect();

        $this->assertFalse($affiliation->fresh()->status);

        $this->actingAs($user)
            ->patch(route('admin.affiliations.toggle', $affiliation))
            ->assertRedirect();

        $this->assertTrue($affiliation->fresh()->status);
    }

    public function test_user_can_update_and_delete_affiliation(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $affiliation = Affiliation::create([
            'name' => 'Old Name',
            'logo' => 'affiliation/old.png',
            'status' => true,
        ]);

        $this->actingAs($user)
            ->put(route('admin.affiliations.update', $affiliation), [
                'name' => 'Updated Name',
                'status' => '1',
            ])
            ->assertRedirect(route('admin.affiliations.index'));

        $this->assertDatabaseHas('affiliations', [
            'id' => $affiliation->id,
            'name' => 'Updated Name',
        ]);

        $this->actingAs($user)
            ->delete(route('admin.affiliations.destroy', $affiliation))
            ->assertRedirect(route('admin.affiliations.index'));

        $this->assertDatabaseMissing('affiliations', [
            'id' => $affiliation->id,
        ]);
    }

    public function test_authenticated_user_can_view_payment_methods_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.payment-methods.index'))
            ->assertOk()
            ->assertSee('We Accept')
            ->assertSee('Add Payment Method');
    }

    public function test_user_can_create_payment_method_with_details(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('card.png');

        $response = $this->actingAs($user)
            ->post(route('admin.payment-methods.store'), [
                'name' => 'Dollar Card',
                'logo' => $file,
                'details' => '<p>Accepted for USD travel bookings. No conversion fees.</p>',
                'status' => '1',
            ]);

        $response->assertRedirect(route('admin.payment-methods.index'));

        $this->assertDatabaseHas('payment_methods', [
            'name' => 'Dollar Card',
            'status' => true,
        ]);

        $method = PaymentMethod::where('name', 'Dollar Card')->first();
        $this->assertStringContainsString('USD travel bookings', $method->details);
    }

    public function test_user_can_toggle_payment_method_status(): void
    {
        $user = User::factory()->create();
        $method = PaymentMethod::create([
            'name' => 'MasterCard',
            'status' => true,
            'sort_order' => 1,
        ]);

        $this->actingAs($user)
            ->patch(route('admin.payment-methods.toggle', $method))
            ->assertRedirect();

        $this->assertFalse($method->fresh()->status);
    }

    public function test_user_can_update_and_delete_payment_method(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $method = PaymentMethod::create([
            'name' => 'Visa',
            'details' => 'Initial details',
            'status' => true,
        ]);

        $this->actingAs($user)
            ->put(route('admin.payment-methods.update', $method), [
                'name' => 'Visa Card',
                'details' => 'Configured updated instructions and bank fee notes.',
                'status' => '1',
            ])
            ->assertRedirect(route('admin.payment-methods.index'));

        $this->assertDatabaseHas('payment_methods', [
            'id' => $method->id,
            'name' => 'Visa Card',
        ]);

        $this->actingAs($user)
            ->delete(route('admin.payment-methods.destroy', $method))
            ->assertRedirect(route('admin.payment-methods.index'));

        $this->assertDatabaseMissing('payment_methods', [
            'id' => $method->id,
        ]);
    }

    public function test_universal_reorder_works_for_affiliations_and_payment_methods(): void
    {
        $user = User::factory()->create();

        $aff1 = Affiliation::create(['name' => 'Aff 1', 'logo' => '1.png', 'sort_order' => 1]);
        $aff2 = Affiliation::create(['name' => 'Aff 2', 'logo' => '2.png', 'sort_order' => 2]);

        $this->actingAs($user)
            ->post(route('admin.reorder', 'affiliations'), [
                'ids' => [$aff2->id, $aff1->id],
            ])
            ->assertNoContent();

        $this->assertEquals(1, $aff2->fresh()->sort_order);
        $this->assertEquals(2, $aff1->fresh()->sort_order);

        $pay1 = PaymentMethod::create(['name' => 'Pay 1', 'sort_order' => 1]);
        $pay2 = PaymentMethod::create(['name' => 'Pay 2', 'sort_order' => 2]);

        $this->actingAs($user)
            ->post(route('admin.reorder', 'payment-methods'), [
                'ids' => [$pay2->id, $pay1->id],
            ])
            ->assertNoContent();

        $this->assertEquals(1, $pay2->fresh()->sort_order);
        $this->assertEquals(2, $pay1->fresh()->sort_order);
    }

    public function test_frontend_footer_displays_active_affiliations_and_payment_methods(): void
    {
        Affiliation::create([
            'name' => 'Nepal Tourism Board',
            'logo' => 'affiliation/ntb.svg',
            'status' => true,
            'sort_order' => 1,
        ]);

        Affiliation::create([
            'name' => 'Hidden Partner',
            'logo' => 'affiliation/hidden.svg',
            'status' => false,
            'sort_order' => 2,
        ]);

        PaymentMethod::create([
            'name' => 'Dollar Card',
            'details' => 'Pay in USD directly.',
            'status' => true,
            'sort_order' => 1,
        ]);

        PaymentMethod::create([
            'name' => 'Hidden Gateway',
            'status' => false,
            'sort_order' => 2,
        ]);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Our Affiliations')
            ->assertSee('Nepal Tourism Board')
            ->assertDontSee('Hidden Partner')
            ->assertSee('We Accept')
            ->assertSee('Dollar Card')
            ->assertDontSee('Hidden Gateway');
    }
}
