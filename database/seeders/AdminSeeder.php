<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure Admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $admin = User::updateOrCreate(
            ['email' => 'admin@palestinehub.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123')
            ]
        );

        $admin->assignRole('Admin');
        $admin->assignRole('admin');
    }
}