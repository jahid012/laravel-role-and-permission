<?php

namespace Database\Seeders;

use App\Models\FrontUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontUser::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(1111),
        ]);
    }
}
