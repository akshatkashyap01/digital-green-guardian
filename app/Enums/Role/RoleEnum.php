<?php

namespace App\Enums\Role;

enum RoleEnum: string
{
    case SuperAdmin = 'Super admin';
    case Manager = 'Manager';
    case Member = 'Member';

    public function label(): string
    {
        return match ($this) {
            RoleEnum::SuperAdmin => 'Super Admin',
            RoleEnum::Manager => 'Manager',
            RoleEnum::Member => 'Member'

        };
    }
}
