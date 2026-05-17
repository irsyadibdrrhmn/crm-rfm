<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@diqichix.test'],
            [
                'name' => 'Admin Salon',
                'password' => Hash::make('password'),
            ]
        );
    }
}
