<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Set::factory(3)->create();

        ProductType::factory()->create([
            'name' => 'Booster Box',
            'slug' => 'booster-box'
        ]);

        foreach (Set::all() as $set)
        {
            Card::factory(8)->create([
                'set_id' => $set->id
            ]);

            foreach (ProductType::all() as $productType)
            {
                Product::factory(1)->create([
                    'set_id' => $set->id,
                    'product_type_id' => $productType->id
                ]);
            }
        }
    }
}
