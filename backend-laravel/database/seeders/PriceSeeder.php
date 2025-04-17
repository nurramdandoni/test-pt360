<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::insert([
            ['product_id' => 1, 'unit' => 'bungkus'],
            ['product_id' => 1, 'unit' => 'slop'],
            ['product_id' => 2, 'unit' => 'tablet'],
            ['product_id' => 3, 'unit' => 'pcs'],
        ]);
    }
}
