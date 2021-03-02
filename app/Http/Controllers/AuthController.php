<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // $this->createAdminUser();
        if (Auth::check()) {
            return redirect($this->urlHome);
        }

        return $this->view();
    }

    /**
     * 创建后台测试用管理员
     */
    protected function createAdminUser()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@qq.com',
            'password' => bcrypt('admin123'),
        ]);
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
            'captcha' =>'required|captcha',
        ], [
            'email' => '账号错误',
            'password' => '密码错误',
            'captcha' => '验证码错误',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return $this->apiData(['url' => $this->urlHome]);
        } else {
            return $this->apiBad('账号或密码错误');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect($this->urlLogin);
    }
}
