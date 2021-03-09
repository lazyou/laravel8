<?php

namespace App\Models;

class Shop extends Base
{
    protected $table = 'shop';

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'country',
        'remark',
    ];
}
