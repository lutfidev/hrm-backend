<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'profile_image' => 'https://via.placeholder.com/150',
            'email' => 'superadmin@hrm.com',
            'password' => Hash::make('12345678'),
            'shift_id' => null,
            'status' => 'Enable',
            'department_id' => null,
            'designation_id' => null,
            'role_id' => \App\Models\Role::where('name', 'admin')->first()->id,

            'phone' => '085895226892',
            'address' => 'Surabaya, East Java, Indonesia',
            'company_id' => 1,
            'is_superadmin' => 1,
            'user_type' => 'employee',
            'login_enabled' => 1,
            // 'created_by' => 1, // Assuming Super Admin is created by itself
        ]);

        User::factory()->create([
            'name' => 'Lutfi',
            'username' => 'lutfi_admin',
            'email' => 'lutfi@hrm.com',
            'profile_image' => 'https://via.placeholder.com/150',
            'password' => Hash::make('12345678'),
            'shift_id' => null,
            'status' => 'Enable',
            'department_id' => null,
            'designation_id' => null,
            'role_id' => \App\Models\Role::where('name', 'admin')->first()->id,

            'phone' => '085895226892',
            'address' => 'Surabaya, East Java, Indonesia',
            'company_id' => 1,
            'is_superadmin' => 0,
            'user_type' => 'employee',
            'login_enabled' => 1,
            //'created_by' => 1, // Created by Super Admin
        ]);
    }
}
