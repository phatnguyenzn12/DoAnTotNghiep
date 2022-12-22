<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eduport.webestica.com/workshop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 16:34:55 GMT -->

<head>
    <title>@yield('title')</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Eduport- LMS, Education and Course Theme">
    <meta name="description" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/frontend/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="/frontend/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7N7LGGGWT1"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-7N7LGGGWT1');
    </script>

    @yield('head-links')
</head>

<body>

    @include('_alert')

    <!-- Header START -->
    <header class="navbar-light navbar-sticky">
        @include('layouts.client.header')
    </header>

    <!-- Main Contents -->
    <main>
        @yield('content')
    </main>
    <!-- End Main Contents -->

    <!-- footer -->
    <footer class="pt-5">
        @include('layouts.client.footer')
    </footer>

    @yield('component_bot')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/var-global.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Start of Fchat.vn-->
    <script type="text/javascript" src="https://cdn.fchat.vn//frontend/embed/webchat.js?id=634c3ebb49accb26d441d0c3"
        async="async"></script>
    <!--End of Fchat.vn-->

    <!-- Bootstrap JS -->
    <script src="/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="/frontend/vendor/tiny-slider/tiny-slider.js"></script>
    <script src="/frontend/vendor/glightbox/js/glightbox.js"></script>
    <script src="/frontend/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>


    <!-- Template Functions -->
    <script src="/frontend/js/functions.js"></script>
    @yield('js-links')
    @stack('js-handles')
</body>

</html>
