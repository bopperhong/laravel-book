<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminUser = User::create([
            'name' => 'Superadmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'verified' => 1,
        ]);

        $adminUser->assignRole('admin');
        $adminUser->assignRole('seller');

    }
}
