<?php

namespace Database\Factories;

use App\Models\CardElement;
use App\Models\Set;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
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
            'reference' => fake()->numberBetween(1, 128),
            'card_elements' => array(
                'illustrator' => fake()->name(), 
                'rarity' => fake()->name(), 
                'health' => fake()->numberBetween(1, 128)
            ),
            'set_id' => Set::all()->random()->id,
        ];
    }
}
