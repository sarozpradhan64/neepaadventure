<?php

use App\Models\User;
use Blaze\AdminCore\Models\Menu;
use Blaze\AdminCore\Models\ServiceCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_add_service_category_menu_item_without_explicit_title(): void
    {
        $user = User::factory()->create();
        $rootMenu = Menu::create([
            'title' => 'Treks',
            'status' => true,
        ]);

        $category = ServiceCategory::create([
            'name' => 'Langtang',
            'slug' => 'langtang',
            'status' => true,
            'sort_order' => 1,
        ]);

        $response = $this->actingAs($user)->post(route('admin.menus.items.store', $rootMenu), [
            'type' => 'service_category',
            'reference_id' => $category->id,
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('menus', [
            'parent_id' => $rootMenu->id,
            'type' => 'service_category',
            'reference_id' => $category->id,
            'title' => 'Langtang',
        ]);
    }

    public function test_cannot_add_sub_item_under_service_category_item(): void
    {
        $user = User::factory()->create();
        $rootMenu = Menu::create([
            'title' => 'Treks',
            'status' => true,
        ]);

        $categoryItem = Menu::create([
            'parent_id' => $rootMenu->id,
            'title' => 'Langtang',
            'type' => 'service_category',
            'reference_id' => 1,
            'status' => true,
        ]);

        $response = $this->actingAs($user)->post(route('admin.menus.items.store', $categoryItem), [
            'type' => 'custom_url',
            'title' => 'Sub item',
            'url' => '/sub-item',
        ]);

        $response->assertSessionHas('error');
        $this->assertDatabaseMissing('menus', [
            'parent_id' => $categoryItem->id,
            'title' => 'Sub item',
        ]);
    }

    public function test_can_create_and_update_base_menu_with_url(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.menus.store'), [
            'title' => 'Projects',
            'url' => '/projects',
            'status' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('menus', [
            'parent_id' => null,
            'title' => 'Projects',
            'url' => '/projects',
            'type' => 'custom_url',
            'status' => 1,
        ]);

        $menu = Menu::where('title', 'Projects')->first();

        $updateResponse = $this->actingAs($user)->put(route('admin.menus.update', $menu), [
            'title' => 'Our Projects',
            'url' => '/projects',
            'status' => '1',
        ]);

        $updateResponse->assertSessionHasNoErrors();
        $this->assertDatabaseHas('menus', [
            'id' => $menu->id,
            'title' => 'Our Projects',
            'url' => '/projects',
        ]);
    }

    public function test_admin_menu_create_and_edit_render_static_routes(): void
    {
        $user = User::factory()->create();

        $menu = Menu::create([
            'title' => 'Community',
            'url' => '/community',
            'type' => 'custom_url',
            'status' => true,
        ]);

        $this->actingAs($user)
            ->get(route('admin.menus.create'))
            ->assertOk()
            ->assertSee('Menu URL / Route')
            ->assertSee('/projects')
            ->assertSee('/about-us');

        $this->actingAs($user)
            ->get(route('admin.menus.edit', $menu))
            ->assertOk()
            ->assertSee('Menu URL / Route')
            ->assertSee('/community')
            ->assertSee('urlVal: \'/community\'', false);
    }

    public function test_admin_menus_index_suggests_missing_root_paths(): void
    {
        $user = User::factory()->create();

        // With no menus created, missing root paths like Projects should be suggested
        $response = $this->actingAs($user)
            ->get(route('admin.menus.index'))
            ->assertOk()
            ->assertSee('Missing Root Paths Suggested for Menus')
            ->assertSee('Projects')
            ->assertSee('/projects');

        // Clicking the suggested button links to create page with prefilled title and url
        $createResponse = $this->actingAs($user)
            ->get(route('admin.menus.create', ['title' => 'Projects', 'url' => '/projects']))
            ->assertOk()
            ->assertSee('value="Projects"', false)
            ->assertSee('urlVal: \'/projects\'', false);
    }

    public function test_sub_menu_item_under_menu_must_have_unique_title(): void
    {
        $user = User::factory()->create();
        $rootMenu = Menu::create([
            'title' => 'About Us',
            'status' => true,
        ]);

        // First sub-item succeeds
        $firstItemResponse = $this->actingAs($user)->post(route('admin.menus.items.store', $rootMenu), [
            'type' => 'custom_url',
            'title' => 'Our Team',
            'url' => '/about-us/team',
        ]);
        $firstItemResponse->assertSessionHasNoErrors();
        $this->assertDatabaseHas('menus', [
            'parent_id' => $rootMenu->id,
            'title' => 'Our Team',
        ]);

        // Duplicate title (even with different casing/spacing) under same menu must fail
        $duplicateResponse = $this->actingAs($user)->post(route('admin.menus.items.store', $rootMenu), [
            'type' => 'custom_url',
            'title' => '  our team  ',
            'url' => '/about-us/team-2',
        ]);

        $duplicateResponse->assertSessionHasErrors('title', null, 'menu_item');
        $duplicateResponse->assertSessionHas('error');
        $this->assertFalse(session()->get('errors')->has('title'));
        $this->assertCount(1, Menu::where('parent_id', $rootMenu->id)->where('title', 'Our Team')->get());
    }

    public function test_updating_sub_menu_item_to_duplicate_title_is_prevented(): void
    {
        $user = User::factory()->create();
        $rootMenu = Menu::create([
            'title' => 'About Us',
            'status' => true,
        ]);

        $itemA = Menu::create([
            'parent_id' => $rootMenu->id,
            'title' => 'Our Team',
            'type' => 'custom_url',
            'url' => '/about-us/team',
            'status' => true,
            'is_editable' => true,
        ]);

        $itemB = Menu::create([
            'parent_id' => $rootMenu->id,
            'title' => 'Our Story',
            'type' => 'custom_url',
            'url' => '/about-us/story',
            'status' => true,
            'is_editable' => true,
        ]);

        // Updating itemB to 'Our Team' must fail
        $response = $this->actingAs($user)->put(route('admin.items.update', $itemB), [
            'type' => 'custom_url',
            'title' => 'Our Team',
            'url' => '/about-us/story',
        ]);

        $response->assertSessionHasErrors('title', null, 'menu_item');
        $response->assertSessionHas('error');
        $this->assertFalse(session()->get('errors')->has('title'));
        $this->assertEquals('Our Story', $itemB->fresh()->title);

        // Updating itemB keeping its own title succeeds
        $successResponse = $this->actingAs($user)->put(route('admin.items.update', $itemB), [
            'type' => 'custom_url',
            'title' => 'Our Story Updated',
            'url' => '/about-us/story',
        ]);

        $successResponse->assertSessionHasNoErrors();
        $this->assertEquals('Our Story Updated', $itemB->fresh()->title);
    }
}
