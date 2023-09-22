<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'status',
        'qty'
    ];

    public $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'status' => 'required',
        'qty' => 'required',
        'type' => 'required',
        'color' => 'required',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'id', 'product_id');
    }
}
