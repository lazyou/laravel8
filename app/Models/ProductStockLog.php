<?php

namespace App\Models;

class ProductStockLog extends Base
{
    protected $table = 'product_stock_log';

    protected $fillable = [
        'user_id',
        'type',
        'product_id',
        'quantity',
        'promp',
        'promp_id',
        'remark',
    ];
}
