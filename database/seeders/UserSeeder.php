<?php

namespace Database\Seeders;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin', 
            
        ]);
        User::create([
            'name' => 'Mariama DIALLO',
            'prenom' => 'Mariama',
            'email' => 'diallo@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin', 
            
        ]);
        User::create([
            'name' => 'Djiye NGOM',
            'prenom' => 'Djiye',
            'email' => 'ngom@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin', 
            
        ]);
        User::create([
            'name' => 'Tidjane BADJI',
            'prenom' => 'Tidjane',
            'email' => 'badji@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin', 
            
        ]);
    }
}
