<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++){
            $is_emply = rand(0,1);
            $email = Str::random(10).'@wearable.com.my';
            DB::table('user')->insert([
                'email' => $email,
                'password' => Str::random(6),
                'first_name' => Str::random(3),
                'last_name' => Str::random(5),
                'phone' => rand(6010, 6019).'-'.rand(0000000, 9999999),
                'is_emply' => $is_emply,
            ]);
            if ($is_emply == 1){
                // $id = DB::table('user') -> where('email', $email) -> get() -> email;
                $id = DB::getPdo()->lastInsertId();
                DB::table('employee')->insert([
                    'user_id' => $id,
                    'department' => Str::random(5),
                    'permission' => rand(0,1),
                ]);
            }
            
        }
    }
}
