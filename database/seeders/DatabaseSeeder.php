<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate([
            'email' => 'adm@example.com',
        ], [
            'name' => 'Admin',
            'email' => 'adm@example.com',
            // 'password' => '12344321',
            'password' => \Hash::make('12344321'),
        ]);
    }
}
