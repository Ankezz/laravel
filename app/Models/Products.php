<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_name',
        'product_description',
        'product_price',
        'product_qty',
        'product_image',
        'product_code',
        'product_categ',
    ];

}
