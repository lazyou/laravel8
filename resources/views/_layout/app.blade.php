<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $_head['title'] }}</title>
        <!-- Tell the browser to be responsive to screen width -->
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
        @yield('content')
    </body>

    @stack('js')
</html>
