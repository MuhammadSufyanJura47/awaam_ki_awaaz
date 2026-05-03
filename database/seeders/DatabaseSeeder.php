<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mrckbjxspace@gmail.com'],
            [
                'name' => 'Muhammad Sufyan Jura',
                'password' => 'mrckbjxspace47',
            ]
        );
    }
}
