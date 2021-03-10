<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('仓库管理');
            return $this->view();
        }

        return [
        ];
    }
}
