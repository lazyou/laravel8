<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('仓库管理');
            return $this->view();
        }

        $map = [
            'id',
            'name' => 'like',
            'created_at' => 'between',
        ];

        return vuePaginate(Warehouse::class, $map);
    }
}
