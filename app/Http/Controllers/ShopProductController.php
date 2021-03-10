<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('店铺产品');
            return $this->view();
        }

        return [
        ];
    }
}
