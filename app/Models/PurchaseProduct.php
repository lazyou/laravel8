<?php

namespace App\Models;

class PurchaseProduct extends Base
{
    protected $table = 'purchase_product';

    protected $fillable = [
        'warehouse_id',
        'purchase_id',
        'product_id',
        'cost',
        'package',
        'quantity',
        'confirm_package',
        'confirm_quantity',
        'quantity_status',
        'remark',
    ];
}
