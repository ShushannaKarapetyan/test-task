<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'Admin',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name' => 'Editor',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name' => 'Writer',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name' => 'Publisher',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
