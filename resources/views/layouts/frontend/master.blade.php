<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Aligned Global Network ">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="10 days">
    <meta name="author" content="Women In Digital">

    <!-- Template Main Css Start -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="{{ asset('assets/frontend/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href=" {{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon" />
    <!-- iziToast Css -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- Other Page Css -->
    @stack('page-css')
</head>

<body>

    <!-- Header Section Start -->
    @include('layouts.frontend.partials.header')
    <!-- Header Section End -->

    <!-- Yield another page -->
    @yield('page-content')
    <!-- End Yield another page -->

    <!-- Footer Section Start -->
    @include('layouts.frontend.partials.footer')

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    @stack('page-js')

    @yield('js')
</body>

</html>
