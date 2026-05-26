<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => '1',
            'status' => 1,
            'hp' => '081234567890',
            'password' => bcrypt('raditya123'),
        ]);

        User::create([
            'nama' => 'Sopian aji',
            'email' => 'sopianaji@admin.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081234567890',
            'password' => bcrypt('P@55word'),
        ]);
    }
}
