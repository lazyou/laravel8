<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('系统产品');
            return $this->view();
        }

        return [
        ];
    }
}
