<?php

namespace App\Models;

class Warehouse extends Base
{
    protected $table = 'warehouse';

    protected $fillable = [
        'user_id',
        'name',
        'remark',
    ];
}
