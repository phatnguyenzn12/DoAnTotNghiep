<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.foxthemes.net/courseplus-v4.3.1/default/explore.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Sep 2022 10:52:14 GMT -->

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
    <link rel="stylesheet" href="/frontend/assets/css/icons.css">
    <link rel="stylesheet" href="/frontend/assets/css/uikit.css">
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <link href="/frontend/libarys/tailwind.min.css" rel="stylesheet">
    

    @yield('head-links')
</head>

<body>
    @include('_alert')

    <div id="wrapper" class="horizontal" data-loading>

        <!--  Header  -->
        <header class="is-transparent is-dark border-b backdrop-filter backdrop-blur-2xl"
            uk-sticky="cls-inactive: is-dark is-transparent border-b">
            <div class="header_inner">
                @include('layouts.client.header')
            </div>
        </header>

        <!-- Main Contents -->

        @yield('content')

        <!-- End Main Contents -->

        <!-- footer -->
        
        <div class="lg:mt-28 mt-10 mb-7 px-12 border-t pt-7">
            @include('layouts.client.footer')
        </div>

        @yield('component_bot')


    </div>


    <!-- Javascript
    ================================================== -->
    <script src="/frontend/libarys/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="/frontend/libarys/uikit.min.js"></script>
    <script src="/frontend/assets/js/uikit.js"></script>
    <script src="/frontend/assets/js/tippy.all.min.js"></script>
    <script src="/frontend/assets/js/simplebar.js"></script>
    {{-- <script src="/frontend/assets/js/custom.js"></script> --}}
    <script src="/frontend/assets/js/bootstrap-select.min.js"></script>
    <script src="/js/var-global.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Start of Fchat.vn-->
    <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=634c3ebb49accb26d441d0c3"
        async="async"></script>
    <!--End of Fchat.vn-->
    @yield('js-links')
    @stack('js-handles')
</body>

</html>
