<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemsDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_details')->insert([
            [
                'item_name' => 'Polo T',
                'item_quantity' => '5',
                'item_size' => 'XL',
                'item_unit_price' => '25.99'
            ], [
                'item_name' => 'Hoodies',
                'item_quantity' => '15',
                'item_size' => 'L',
                'item_unit_price' => '89.99'
            ],[
                'item_name' => 'Jackets',
                'item_quantity' => '50',
                'item_size' => 'XXL',
                'item_unit_price' => '75.99'
            ]
        ]);
    }
}
