<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopOrderController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('店铺订单');
            return $this->view();
        }

        return [
        ];
    }
}
