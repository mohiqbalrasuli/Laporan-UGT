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

        User::factory()->createMany([
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'fausi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'PJGT',
                'status' => 'aktif',
            ],
            [
                'name' => 'Ahmad Habibi',
                'email' => 'habibi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'GT',
                'status' => 'aktif',
            ],
        ]);
    }
}
