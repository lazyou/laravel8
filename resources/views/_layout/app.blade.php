<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $_head['title'] }}</title>
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>" id="csrf-token">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        {{-- TODO: vue 相关组件   --}}
        {{--<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">--}}
        {{--<script src="https://unpkg.com/vue/dist/vue.js"></script>--}}
        {{--<script src="https://unpkg.com/element-ui/lib/index.js"></script>--}}
        {{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
        <link rel="stylesheet" href="{{ asset('plugins/vue/element-ui-2.14.0.css') }}">
        <script src="{{ asset('plugins/vue/vue-2.6.12.js') }}"></script>
        <script src="{{ asset('plugins/vue/element-ui-2.14.0.js') }}"></script>
        <script src="{{ asset('plugins/vue/axios-0.21.0.min.js') }}"></script>
        <script src="{{ asset('plugins/vue/axios-util.js') }}"></script>
        @stack('css')
    </head>

    <body>
        <div id="app">
            <el-container>
                <el-aside width="200px" style="background-color: rgb(238, 241, 246);">
                    <el-menu :default-openeds="['1', '2']">
                        @foreach($_menus as $key => $menu)
                        <a href="{{ $menu['url'] }}">
                            <el-menu-item index="{{ $key }}">
                                <i class="{{ $menu['icon'] }}"></i>
                                <span slot="title">{{ $menu['name'] }}</span>
                            </el-menu-item>
                        </a>
                        @endforeach
                    </el-menu>
                </el-aside>

                <el-container>
                    <el-header style="text-align: right; font-size: 12px; background-color: #B3C0D1; color: #333; line-height: 60px;">
                        <el-dropdown>
                          <span class="el-dropdown-link">
                              {{ $_auth->name }}
                              <i class="el-icon-arrow-down el-icon--right"></i>
                          </span>
                        <el-dropdown-menu slot="dropdown">
                            <el-link href="/admin/auth/logout">
                                <el-dropdown-item>注销</el-dropdown-item>
                            </el-link>
                        </el-dropdown-menu>
                        </el-dropdown>
                    </el-header>

                    <el-main>
                        @yield('content')
                    </el-main>
                </el-container>
            </el-container>
        </div>

        <style>
            .el-menu a {
                text-decoration: unset;
            }
        </style>

        <script>
            @yield('content-vue')
            new Vue(obj);
        </script>

    @stack('js')
    </body>
</html>
