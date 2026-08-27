<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StyleHubAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_the_dashboard(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_admins_can_open_the_product_form(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']))
            ->get('/products/create')
            ->assertOk();
    }

    public function test_customers_cannot_manage_products(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'customer']))
            ->get('/products/create')
            ->assertForbidden();
    }

    public function test_product_relationships_are_available(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'Essentials']);
        $product = Product::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'name' => 'Test Tee',
            'description' => 'A test product.',
            'price' => 25,
            'size' => 'M',
            'color' => 'White',
            'stock' => 4,
        ]);

        $this->assertSame($user->id, $product->user->id);
        $this->assertSame($category->id, $product->category->id);
        $this->assertTrue($user->products->contains($product));
        $this->assertTrue($category->products->contains($product));
    }
}
