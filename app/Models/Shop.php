<?php

namespace App\Models;

use Illuminate\Support\Arr;

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

    protected $appends = [
        'type_name',
    ];

    const TYPE_LAZADA = 1;
    const TYPE_SHOPEE = 2;
    const TYPE_OPTIONS = [
        self::TYPE_LAZADA => 'lazada',
        self::TYPE_SHOPEE => 'shopee',
    ];

    protected function getTypeNameAttribute()
    {
        return Arr::get(self::TYPE_OPTIONS, $this->type, '未知');
    }
}
