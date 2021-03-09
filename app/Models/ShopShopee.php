<?php

namespace App\Models;

class ShopShopee extends Base
{
    protected $table = 'shop_shopee';

    protected $fillable = [
        'shop_id',
        'shop_name',
        'country',
        'shop_description',
        'videos',
        'images',
        'disable_make_offer',
        'enable_display_unitno',
        'item_limit',
        'status',
        'installment_status',
        'is_cb',
        'non_pre_order_dts',
    ];
}
