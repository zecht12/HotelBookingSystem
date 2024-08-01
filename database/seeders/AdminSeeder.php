<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'     => 'Administrator',
            'username'    => 'admin',
            'role'    => 'admin',
            'password' => bcrypt('1234'),
        ]);
        Admin::create([
            'name'     => 'user',
            'username'    => 'user',
            'role'    => 'user',
            'password' => bcrypt('1234'),
        ]);
    }
}
