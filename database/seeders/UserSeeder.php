<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User();

        $user->name = 'john';
        $user->email = 'john@g.com';
        $user->password = bcrypt('123456');

        $user->save();
    }
}
