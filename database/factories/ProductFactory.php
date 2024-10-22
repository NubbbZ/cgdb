<?php

namespace Database\Factories;

use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->name(),
            'slug' => Str::slug($name),
            'image' => fake()->imageUrl(),
            'release_date' => fake()->date(),
            'product_type_id' => ProductType::all()->random()->id,
            'set_id' => Set::all()->random()->id,
        ];
    }
}
