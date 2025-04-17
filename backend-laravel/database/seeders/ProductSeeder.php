<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'Dji Sam Soe',
                'product_category' => 'Rokok',
                'description' => 'ini adalah rokok Dji Sam Soe'
            ],
            [
                'name' => 'Paracetamol',
                'product_category' => 'Obat',
                'description' => 'Obat untuk meredakan demam dan nyeri'
            ],
            [
                'name' => 'Masker Kain',
                'product_category' => 'Lainnya',
                'description' => 'Masker untuk perlindungan wajah'
            ],
        ]);
    }
}
