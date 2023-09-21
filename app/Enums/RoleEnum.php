<?php

namespace App\Enums;

enum RoleEnum:string
{
	case ADMIN = 'ADMIN';
	case PENGGUNA = 'PENGGUNA';

    public static function toArray(): array
    {
        return array_map(
            fn (RoleEnum $roleEnum) => $roleEnum->value, RoleEnum::cases()
        );
    }
}
