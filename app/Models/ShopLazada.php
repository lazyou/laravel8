<?php

namespace App\Models;

class ShopLazada extends Base
{
    protected $table = 'shop_lazada';

    protected $fillable = [
        'shop_id',
        'name_company',
        'seller_id',
        'name',
        'short_code',
        'logo_url',
        'email',
        'cd',
        'location',
    ];
}
