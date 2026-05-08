<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kasir',
            'email' => 'cashier@restaurant.com',
            'password' => Hash::make('password'),
            'role' => 'cashier',
            'phone' => '+62 812-3456-7890',
            'address' => 'Jl. Restoran No. 1, Jakarta',
        ]);

        User::create([
            'name' => 'Kasir 2',
            'email' => 'cashier2@restaurant.com',
            'password' => Hash::make('password'),
            'role' => 'cashier',
            'phone' => '+62 812-9876-5432',
        ]);

        User::create([
            'name' => 'Marvis Ighedosa',
            'email' => 'dosamarvis@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+234 9011039271',
            'address' => 'No 15 uti street off ovie palace road effurun delta state',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+62 813-5555-1234',
            'address' => 'Jl. Merdeka No. 10, Bandung',
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+62 857-6666-7890',
            'address' => 'Jl. Sudirman No. 25, Surabaya',
        ]);
    }
}

