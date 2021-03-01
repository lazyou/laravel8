<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->wantsJson()) {
            $this->setHeadTitle('Vue列表');
            return $this->view();
        }

        sleep(1);

        return [
            [
                'date' => '2016-05-02',
                'name' => '王小虎',
                'address' => '上海市普陀区金沙江路 1518 弄'
            ],
            [
                'date' => '2016-05-04',
                'name' => '王小虎',
                'address' => '上海市普陀区金沙江路 1517 弄'
            ],
            [
                'date' => '2016-05-01',
                'name' => '王小虎',
                'address' => '上海市普陀区金沙江路 1519 弄'
            ],
            [
                'date' => '2016-05-03',
                'name' => '王小虎',
                'address' => '上海市普陀区金沙江路 1516 弄'
            ],
        ];
    }
}
