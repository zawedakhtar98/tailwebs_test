<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeederData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'test', 'email' => 'test@gmail.com', 'password' => bcrypt('test123')],
            ['name' => 'user', 'email' => 'user@gmail.com', 'password' => bcrypt('user123')]
        ];

        User::insert($data);
    }
}
