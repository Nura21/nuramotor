<?php

namespace App\Enums;

enum StatusEnum:string
{
	case READY = 1;
	case UNREADY = 0;

    public static function toArray(): array
    {
        return array_map(
            fn (StatusEnum $statusEnum) => $statusEnum->value, StatusEnum::cases()
        );
    }
}
