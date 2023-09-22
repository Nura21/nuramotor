<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'type_id',
        'qty',
        'price',
        'transaction_id',
    ];

    public $rules = [
        'product_id' => 'required',
        'type_id' => 'required',
        'qty' => 'required',
        'price' => 'required',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id')->withDefault();
    }
}
