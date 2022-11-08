<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus is - Professional A unique and beautiful collection of UI elements">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link href="/frontend/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- icons
    ================================================== -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/frontend/assets/css/uikit.css">
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <link href="/frontend/libarys/tailwind.min.css" rel="stylesheet">

    @yield('head-links')

    <style>
        input,
        .bootstrap-select.btn-group button {
            background-color: #f3f4f6 !important;
            height: 44px !important;
            box-shadow: none !important;
        }
    </style>

</head>

<body>
    
    @include('_alert')

    <div id="wrapper" class="is-verticle">

        <!-- header-->
        <div class="bg-white py-4 shadow dark:bg-gray-800">
            <div class="max-w-6xl mx-auto">

                <div class="flex items-center lg:justify-between justify-around">

                    <a href="{{ route('client') }}" uk-tooltip="title: Home; pos: right">
                        <img src="/frontend/assets/images/logo.png" alt="" class="w-32">
                    </a>

                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm"
                        id="pages">
                        <a href="{{ route('auth.login') }}" class="py-3 px-4">Đăng nhập</a>
                        <a href="{{ route('auth.register') }}" class="">Đăng ký</a>
                    </div>

                </div>

            </div>
        </div>

        <!-- Content-->
        <div>
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="lg:mb-5 py-3 uk-link-reset">
            <div
                class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                <div class="flex space-x-2 text-gray-700 uppercase">
                    <a href="#"> About</a>
                    <a href="#"> Help</a>
                    <a href="#"> Terms</a>
                    <a href="#"> Privacy</a>
                </div>
                <p class="capitalize"> © copyright 2021 by Courseplus</p>
            </div>
        </div>

    </div>


    <!-- Javascript
    ================================================== -->
    <script src="/frontend/libarys/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="/frontend/libarys/uikit.min.js"></script>
    <script src="/frontend/assets/js/uikit.js"></script>
    <script src="/frontend/assets/js/tippy.all.min.js"></script>
    <script src="/frontend/assets/js/simplebar.js"></script>
    <script src="/frontend/assets/js/custom.js"></script>
    <script src="/frontend/assets/js/bootstrap-select.min.js"></script>
    <script src="/js/var-global.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js-links')
    @stack('js-headles')
</body>


<!-- Mirrored from demo.foxthemes.net/courseplus-v4.3.1/default/explore.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Sep 2022 10:53:32 GMT -->

</html>
