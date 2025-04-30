<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enums\Role\RoleEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'ayushreevyas1@gmail.com',
                'password' => 'Ayu@123',
                'role' => RoleEnum::SuperAdmin,
                'name' => 'Ayushree Vyas',
                'phone' => '+91 7906139597',
            ],
            [
                'email' => 'referakshat@gmail.com',
                'password' => 'Ayu@123',
                'role' => RoleEnum::Manager,
                'name' => 'Cooper',
                'phone' => '+91 1234567890',
            ],
            [
                'email' => 'referayushrvyas1@gmail.com',
                'password' => 'Ayu@123',
                'role' => RoleEnum::Member,
                'name' => 'Chunnu',
                'phone' => '+91 1234567890',
            ]
        ];

        foreach ($users as $user) {
            $newUser = User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['password']),
                    'phone' => $user['phone'],
                    'status' => true,
                ]
            );

            $newUser->assignRole($user['role']);
        }
    }
}

