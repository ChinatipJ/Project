<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'email_verified_at' => Carbon::now(), // Marking email as verified
            'password' => Hash::make('1234'), // Hashed password
            'role' => 'admin', // Example role
            'profile' => 'profile', // Profile description
            'username' => 'johndoe', // Unique username
            'remember_token' => null, // Initially null
            'created_at' => now(), // Timestamp for creation
            'updated_at' => now(), // Timestamp for update
        ]);

        // Optionally, create multiple users with different roles or details
        User::factory()->count(10)->create();
    }
}
