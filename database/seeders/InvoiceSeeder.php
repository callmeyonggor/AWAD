<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert(
            [
                'invoice_total' => 100,
                'name' => 'one',
                'company_name' => 'companyOne',
                'address' => '1, Jalan Satu 1/1, 111111 Satu, Selangor',
                'phone' => '0111111111',
                'user_id'=> 1,
                'created_at' => Carbon::now(),
            ],
            
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 200,
                'name' => 'one',
                'company_name' => 'companyOne',
                'address' => '1, Jalan Satu 1/1, 111111 Satu, Selangor',
                'phone' => '0111111111',
                'user_id'=> 1,
                'created_at' => Carbon::now(),
            ],
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 200,
                'name' => 'two',
                'company_name' => 'companyTwo',
                'address' => '2, Jalan Dua 2/2, 222222 Dua, Selangor',
                'phone' => '0122222222',
                'user_id'=> 2,
                'created_at' => Carbon::now(),
            ],
            
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 400,
                'name' => 'two',
                'company_name' => 'companyTwo',
                'address' => '2, Jalan Dua 2/2, 222222 Dua, Selangor',
                'phone' => '0122222222',
                'user_id'=> 2,
                'created_at' => Carbon::now(),
            ],
            
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 300,
                'name' => 'two',
                'company_name' => 'companyTwo',
                'address' => '2, Jalan Dua 2/2, 222222 Dua, Selangor',
                'phone' => '0122222222',
                'user_id'=> 2,
                'created_at' => Carbon::now(),
            ],     
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 700,
                'name' => 'three',
                'company_name' => 'companyTiga',
                'address' => '3, Jalan Tiga 3/3, 333333 Tiga, Selangor',
                'phone' => '0133333333',
                'user_id'=> 3,
                'created_at' => Carbon::now(),
            ], 
        );
        DB::table('invoices')->insert(
            [
                'invoice_total' => 100,
                'name' => 'one',
                'company_name' => 'companyOne',
                'address' => '1, Jalan Satu 1/1, 111111 Satu, Selangor',
                'phone' => '0111111111',
                'user_id'=> 1,
                'created_at' => Carbon::now(),
            ],
        );
    }
}