<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $auth;

    // 登录默认跳转位置
    protected $urlHome = '/admin/vue';
    protected $urlLogin = '/admin/auth/login';

    // 视图数据
    protected array $_data = [
        '_head' => [
            'title' => '后台管理',
        ],
        '_auth' => null,
        '_menus' => [],
        '_menu_active' => '',
    ];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth = Auth::user();
            $this->_data['_auth'] = $this->auth;
            $this->_data['_menus'] = $this->getMenus();
            $this->_data['_menu_active'] = $this->getActiveMenu();
            return $next($request);
        });
    }

    protected function setHeadTitle($title = '后台管理')
    {
        $this->_data['_head']['title'] = $title;
    }

    // 默认视图渲染
    protected function view($path = "", $data = [])
    {
        if (empty($path)) {
            $path = Route::currentRouteName();
            if (empty($path)) {
                throw new \Exception('请设置 Route 的 name 方法');
            }
        }

        return view($path, $this->_data, $data);
    }

    /**
     * 接口失败统一响应
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function apiBad($message = '操作失败', $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    /**
     * 接口操作成功统一响应
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function apiOk($message = '操作成功', $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    /**
     * 接口数据响应
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    protected function apiData($data = [], $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json($data, $code);
    }

    // 接口单条表单验证错误响应
    protected function validateError($key, $errMsg)
    {
        return response(['errors' => new MessageBag([$key => $errMsg])], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    protected function getActiveMenu(): string
    {
        return '/' . request()->path();
    }

    protected function getMenus(): array
    {
        return [
            [
                'name' => '首页',
                'url' => '/admin/home',
                'icon' => 'el-icon-s-data',
            ],
            [
                'name' => '店铺管理',
                'url' => '/admin/shop',
                'icon' => 'el-icon-s-shop',
            ],
            [
                'name' => '仓库管理',
                'url' => '/admin/warehouse',
                'icon' => 'el-icon-house',
            ],
            [
                'name' => '系统产品',
                'url' => '/admin/product',
                'icon' => 'el-icon-goods',
            ],
            [
                'name' => '采购物流',
                'url' => '/admin/purchase',
                'icon' => 'el-icon-shopping-cart-full',
            ],
            [
                'name' => '店铺产品',
                'url' => '/admin/shop_product',
                'icon' => 'el-icon-question',
            ],
            [
                'name' => '店铺订单',
                'url' => '/admin/shop_order',
                'icon' => 'el-icon-question',
            ],
        ];
    }
}
