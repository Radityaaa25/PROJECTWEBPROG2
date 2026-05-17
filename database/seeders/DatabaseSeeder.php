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
        user::create([
            'nama'=> 'Administrator',
            'email'=> 'admin@admin.com',
            'role'=> '1',
            'status'=> 1,
            'hp'=> '0812345678901',
            'password'=> bcrypt('P@55word'),
        ]);
     
        user::create([
            'nama'=> 'Sopian Aji',
            'email'=> 'Sopianaji@admin.com',
            'role'=> '0',
            'status'=> 1,
            'hp'=> '0812345678901',
            'password'=> bcrypt('P@55word'),
        ]);
    }
}
