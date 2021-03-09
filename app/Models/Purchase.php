<?php

namespace App\Models;

class Purchase extends Base
{
    protected $table = 'purchase';

    protected $fillable = [
        'user_id',
        'warehouse_id',
        'domestic_status',
        'domestic_number',
        'overseas_status',
        'overseas_number',
        'remark',
    ];
}
