<?php

namespace App\Enums;

enum ColorEnum:string
{
	case BLUE = 'BLUE';
	case BLACK = 'BLACK';
	case RED = 'RED';
	case WHITE = 'WHITE';
	case GRAY = 'GRAY';
	
    public static function toArray(): array
    {
        return array_map(
            fn (ColorEnum $colorEnum) => $colorEnum->value, ColorEnum::cases()
        );
    }
}
