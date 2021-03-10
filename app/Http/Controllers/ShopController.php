<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('店铺管理');
            return $this->view();
        }

        $map = [
            'id',
            'name' => 'like',
            'created_at' => 'between',
        ];

        return vuePaginate(Shop::orderBy('id', 'DESC'), $map);
    }

    /*
     * 支持授权的店铺列表
     */
    public function oauth()
    {
        return [
            [
                'type' => Shop::TYPE_LAZADA,
                'name' => Shop::TYPE_OPTIONS[Shop::TYPE_LAZADA],
                'oauth_url' => '', // TODO: 动态生成
            ],
            [
                'type' => Shop::TYPE_SHOPEE,
                'name' => Shop::TYPE_OPTIONS[Shop::TYPE_SHOPEE],
                'oauth_url' => '', // TODO: 动态生成
            ],
        ];
    }
}
