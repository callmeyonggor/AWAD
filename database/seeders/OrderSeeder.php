<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\rand;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                'InvoiceID' => rand(0, 10),
                'ItemID' => rand(0, 10),
                'Qty' => rand(0, 10),
            ]);
        }
    }
}