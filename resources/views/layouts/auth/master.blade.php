<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from eduport.webestica.com/workshop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 16:34:55 GMT -->

<head>
    <title>@yield('title')</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/frontend/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/glightbox/css/glightbox.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="/frontend/css/style.css">

    @yield('head-links')
</head>

<body>
    @include('_alert')
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="/frontend/vendor/tiny-slider/tiny-slider.js"></script>
    <script src="/frontend/vendor/glightbox/js/glightbox.js"></script>
    <script src="/frontend/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Functions -->
    <script src="/frontend/js/functions.js"></script>
    @yield('js-links')
    @stack('js-handles')
</body>

</html>
