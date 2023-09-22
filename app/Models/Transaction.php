<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $tables = 'transactions';

    public $rules = [
        'code' => 'required',
        'total_price' => 'required',
        'received' => 'required',
    ];
}
