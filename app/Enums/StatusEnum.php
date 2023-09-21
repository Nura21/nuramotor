<?php

namespace App\Enums;

enum StatusEnum:string
{
	case READY = 'READY';
	case UNREADY = 'UNREADY';

    public static function toArray(): array
    {
        return array_map(
            fn (StatusEnum $statusEnum) => $statusEnum->value, StatusEnum::cases()
        );
    }
}
