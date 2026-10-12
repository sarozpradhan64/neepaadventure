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
}
