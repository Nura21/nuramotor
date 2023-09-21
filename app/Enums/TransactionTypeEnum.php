<?php

namespace App\Enums;

enum TransactionTypeEnum:string
{
	case CASH = 1;
	case KREDIT = 0;

    public static function toArray(): array
    {
        return array_map(
            fn (TransactionTypeEnum $transactionTypeEnum) => $transactionTypeEnum->value, TransactionTypeEnum::cases()
        );
    }
}
