<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Senior Move: Clear the Spatie permission cache before seeding
        // This prevents old cached permissions from breaking fresh database runs
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create the Core Roles
        $adminRole    = Role::create(['name' => 'admin']);
        $vendorRole   = Role::create(['name' => 'vendor']);
        $customerRole = Role::create(['name' => 'customer']);

        // 2. Create the Default Super Admin Account
        $admin = User::create([
            'name'              => 'Ekomart Admin',
            'email'             => 'admin@ekomart.com',
            'phone'             => '+27 12 345 6789', // Default filler phone number
            'password'          => Hash::make('Secret123!'), // Automatically hashed securely
            'status'            => 'active',
            'email_verified_at' => now(),
        ]);

        // 3. Assign the Admin Role to the New User
        $admin->assignRole($adminRole);
    }
}
