<?php

namespace App\Models;

class ProductCombination extends Base
{
    protected $table = 'product_combination';

    protected $fillable = [
        'product_id',
        'sub_product_id',
        'quantity',
    ];
}
