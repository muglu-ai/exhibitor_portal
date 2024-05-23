<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user_login_table;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user_login_table::create([
            'exhibitor_id' => 'EXH1234',
            'login_email' => 'john.doe@example.com',
            // 'password' => bcrypt('password123'),
            'password' => ('password123'),
        ]);
    }
}
