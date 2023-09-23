<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'test',
            'mobile' => '0591234567',
        ]);
        User::factory()->create([
            'name' => 'سعيد صافي',
            'username' => 'said1994',
            'email' => 'said.safi.056@gmail.com',
            'password' => 'SAid1994',
            'mobile' => '0599971755',
        ]);
        // User::create(array('email' => 'said.safi.056@gmail.com'));
    }
}