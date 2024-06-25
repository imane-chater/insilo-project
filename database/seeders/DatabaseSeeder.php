<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert(['first_name' => 'admin',
        'last_name' => 'admin',
        'email' => 'admin@insilo.be',
        'email_verified_at' => now(),
        'role' => 'admin',
        'image' => 'users/TcvDFgXoqjVzyuzVjU66ykvWjEFER5T8kLzyt1PV.png',
        'password' => Hash::make('admin@insilo.be'), // password
        'remember_token' => Str::random(10)]);
    }
}