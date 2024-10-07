<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            RoleSeeder::class,
            SuperadminSeeder::class,
        ]);
    }
}
