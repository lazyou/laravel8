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
        <style>
            {{-- element-ui css 重写, 通用 css --}}
            .el-menu a {
                text-decoration: unset;
            }
            .el-header{
                color: #333;
                font-size: 12px;
                text-align: right;
                line-height: 60px;
                background-color: #f7f8fa!important;
                border-color: #f7f8fa!important;
            }
            .el-main{
                padding: 15px
            }
            .pagination-container{
                padding-top: 15px;
            }
            #action{
                padding-bottom: 15px;
            }
        </style>
        @stack('css')
    </head>

    <body>
        <div id="app" v-loading="app_loading">
            <el-container>
                <el-aside width="200px" style="background-color: rgb(238, 241, 246);">
                    <el-menu default-active="{{ $_menu_active }}">
                        <el-menu-item index="0" disabled style="color: #303133;">
{{--                            <i class="{{ $menu['icon'] }}"></i>--}}
                            <span slot="title" >
                                <strong>Easy ERP</strong>
                            </span>
                        </el-menu-item>
                        @foreach($_menus as $key => $menu)
                            <a href="{{ $menu['url'] }}">
                                <el-menu-item index="{{ $menu['url'] }}">
                                    <i class="{{ $menu['icon'] }}"></i>
                                    <span slot="title">{{ $menu['name'] }}</span>
                                </el-menu-item>
                            </a>
                        @endforeach
                    </el-menu>
                </el-aside>

                <el-container>
                    <el-header>
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

                    <el-main v-loading="main_loading">
                        @yield('content')
                    </el-main>
                </el-container>
            </el-container>
        </div>

        {{-- vue 的组件 --}}
        @yield('component-vue')

        <script>
            // TODO: 如何添加全局的vue属性方法
            let appEl = '#app';
            let appData = {
                app_loading: false,
                main_loading: false,
            };
            @yield('content-vue')
            // let app = {
            //     el: '#app',
            //     data: () => {
            //         return {
            //             ...obj.data(),
            //             mainLoading: false,
            //         };
            //     },
            //     // // TODO: 以下行不通
            //     // created() {
            //     //     obj.created();
            //     // },
            //     methods: {
            //         ...obj.methods,
            //     },
            // };
            new Vue(obj);
        </script>

    @stack('js')
    </body>
</html>
