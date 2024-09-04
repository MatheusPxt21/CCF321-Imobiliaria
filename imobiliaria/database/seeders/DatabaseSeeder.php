<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Corretor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin::create([
            'email' => 'admin1@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Admin One',
        ]);

        Admin::create([
            'email' => 'admin2@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Admin Two',
        ]);

        Admin::create([
            'email' => 'admin3@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Admin Three',
        ]);

        Corretor::create([
            'email' => 'corretor1@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Corretor One',
        ]);

        Corretor::create([
            'email' => 'corretor2@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Corretor Two',
        ]);

        Corretor::create([
            'email' => 'corretor3@example.com',
            'senha' => Hash::make('password123'),
            'nome' => 'Corretor Three',
        ]);
    }
}
