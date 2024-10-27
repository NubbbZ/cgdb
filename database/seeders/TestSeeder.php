<?php

namespace Database\Seeders;

use App\CardElementType;
use App\Models\Card;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_elements')->insert([
            'name' => 'Illustrator',
            'slug' => 'illustrator',
            'type' => CardElementType::text,
        ]);
        DB::table('card_elements')->insert([
            'name' => 'Rarity',
            'slug' => 'rarity',
            'type' => CardElementType::text,
        ]);
        DB::table('card_elements')->insert([
            'name' => 'Health',
            'slug' => 'health',
            'type' => CardElementType::number,
        ]);

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
