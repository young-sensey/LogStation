<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'airat',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'test',
            'email' => 'test3@example.com',
            'password' => Hash::make('test'),
        ]);
    }
}
