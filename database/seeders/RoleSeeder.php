<?php

namespace Database\Seeders;

use App\Enums\Role\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleEnum::cases();

        foreach ($roles as $role) {
            Role::query()
                ->updateOrCreate([
                    'name' => $role->value,
                    'guard_name' => 'web',
                ]);
        }
    }
}
