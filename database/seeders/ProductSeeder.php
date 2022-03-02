<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'name' => 'Polo T',
                'remaining_quantity' => '5',
                'size' => 'XL',
                'unit_price' => '25.99',
                'category' => 'B',
                'status' => true,
                'description' => 'Normal T'
            ], [
                'name' => 'Hoodies',
                'remaining_quantity' => '15',
                'size' => 'L',
                'unit_price' => '89.99',
                'category' => 'G',
                'status' => true,
                'description' => 'Normal Hoodie'
            ],[
                'name' => 'Jackets',
                'remaining_quantity' => '50',
                'size' => 'XXL',
                'unit_price' => '75.99',
                'category' => 'B',
                'status' => false,
                'description' => 'Normal Jacket'
            ]
        ]);
    }
}
