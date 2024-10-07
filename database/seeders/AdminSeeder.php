<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin'),
            'verified' => 1,
        ]);

        $adminUser->assignRole('admin');
        
    }
}
