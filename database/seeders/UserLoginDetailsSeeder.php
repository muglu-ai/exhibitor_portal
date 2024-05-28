<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserLoginDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_login_details')->insert([
            [
                'exhibitor_id' => 'gVF3dpYtOB',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'), // Ensure passwords are hashed
                'actual_password' => 'password123', // Ensure passwords are hashed
                'captcha' => Str::random(10),
                'status' => '1',
                'created_At' => now(),
                'updated_At' => now(),
            ],
        ]);
    }
}
