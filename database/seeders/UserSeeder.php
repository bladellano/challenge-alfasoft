<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Alfasoft',
            'email' => 'alfasoft@email.com',
            'password' => bcrypt('password'),
        ]);

    }
}
