<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        User::insert([
            [
                'username' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'username' => 'Fauzan',
                'email' => 'fauzan@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
