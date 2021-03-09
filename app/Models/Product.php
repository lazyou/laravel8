<?php

namespace App\Models;

class Product extends Base
{
    protected $table = 'product';

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'cover',
        'sku',
        'stock_quantity',
        'remark',
    ];
}
