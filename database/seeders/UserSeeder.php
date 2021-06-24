<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'              => 'Test User',
                'email'             => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Test User 1',
                'email'             => 'test-user1@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Test User 2',
                'email'             => 'test-user2@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Test User 3',
                'email'             => 'test-user3@gmail.com',
                'email_verified_at' => now(),
                'password'          => bcrypt('password'),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
