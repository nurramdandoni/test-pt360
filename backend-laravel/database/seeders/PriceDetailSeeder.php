<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PriceDetail;

class PriceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceDetail::insert([
            ['price_id' => 1, 'tier' => 'Non Member', 'price' => 22000],
            ['price_id' => 1, 'tier' => 'Basic', 'price' => 23000],
            ['price_id' => 1, 'tier' => 'Premium', 'price' => 24000],

            ['price_id' => 2, 'tier' => 'Premium', 'price' => 250000],

            ['price_id' => 3, 'tier' => 'Basic', 'price' => 1000],
            ['price_id' => 3, 'tier' => 'Premium', 'price' => 800],

            ['price_id' => 4, 'tier' => 'Non Member', 'price' => 5000],
        ]);
    }
}
