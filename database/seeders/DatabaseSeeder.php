<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

            $admin = User::factory()->create([
                'name' => 'StyleHub Admin',
                'email' => 'admin@stylehub.test',
                'password' => 'password',
                'role' => 'admin',
            ]);

            $categories = collect(['Outerwear', 'Essentials', 'Accessories'])->mapWithKeys(
                fn (string $name) => [$name => Category::create(['name' => $name])]
            );

            Product::create([
                'user_id' => $admin->id, 'category_id' => $categories['Outerwear']->id,
                'name' => 'The Form Jacket', 'description' => 'A clean, structured layer designed for days that move from desk to dinner.',
                'price' => 128, 'size' => 'M', 'color' => 'Ink', 'stock' => 12,
                'image_url' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=900&q=80',
            ]);
            Product::create([
                'user_id' => $admin->id, 'category_id' => $categories['Essentials']->id,
                'name' => 'Daily Tee', 'description' => 'A substantial cotton tee with a relaxed shape and a soft, lived-in finish.',
                'price' => 42, 'size' => 'L', 'color' => 'Ecru', 'stock' => 30,
                'image_url' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80',
            ]);
            Product::create([
                'user_id' => $admin->id, 'category_id' => $categories['Accessories']->id,
                'name' => 'Everyday Tote', 'description' => 'A generous canvas carry-all for the laptop, the book, and everything in between.',
                'price' => 68, 'size' => 'One size', 'color' => 'Natural', 'stock' => 18,
                'image_url' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=900&q=80',
            ]);
    }
}
