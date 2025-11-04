<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Admin',
            'email' => 'admin.edupro@gmail.com',
            'password' => Hash::make('sayaadmin_edupro123'), // ← password aman (Bcrypt)
        ]);
    }
}