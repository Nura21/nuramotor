<?php

namespace App\Enums;

enum TransactionTypeEnum:string
{
	case CASH = 'CASH';
	case KREDIT = 'KREDIT';

    public static function toArray(): array
    {
        return array_map(
            fn (TransactionTypeEnum $transactionTypeEnum) => $transactionTypeEnum->value, TransactionTypeEnum::cases()
        );
    }
}
