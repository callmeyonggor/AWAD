<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'InvoiceID' => 1,
            'ItemID' => 1,
            'Size' => 'S',
            'Qty' => 1,
            'seeder' => 'M',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 1,
            'ItemID' => 2,
            'Size' => 'M',
            'Qty' => 2,
            'seeder' => 'L',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 1,
            'ItemID' => 3,
            'Size' => 'L',
            'Qty' => 3,
            'seeder' => 'S',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 2,
            'ItemID' => 1,
            'Size' => 'S',
            'Qty' => 1,
            'seeder' => 'M',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 2,
            'ItemID' => 1,
            'Size' => 'M',
            'Qty' => 2,
            'seeder' => 'L',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 3,
            'ItemID' => 3,
            'Size' => 'L',
            'Qty' => 3,
            'seeder' => 'S',
            'created_at' => Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'InvoiceID' => 3,
            'ItemID' => 2,
            'Size' => 'S',
            'Qty' => 4,
            'seeder' => 'M',
            'created_at' => Carbon::now(),
        ]);
    }
}