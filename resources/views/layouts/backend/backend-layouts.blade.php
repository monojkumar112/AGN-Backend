<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--==** Fav-icon **==-->
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">
    <!-- App title -->
    <title>@yield('page-title')</title>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('asset/backend/plugins/morris/morris.css') }}">
    <!-- Switchery css -->
    <link href="{{ asset('assets/backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- App CSS -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- iziToast Css -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- yield another page css -->
    @stack('page-css')
    <style>
        .shadow-lg {
            margin-top: 45px;
        }
    </style>
    @livewireStyles
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('layouts.backend.partials.topbar')
        <!-- Top Bar End -->

        <!--  Left Sidebar Start  -->
        @include('layouts.backend.partials.left-sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Anothr page yeild here  -->
            @yield('page-content')
            <!-- End Anothr page yeild here -->
        </div>
        <!-- End right Content here -->

        <!-- Footer -->
        @include('layouts.backend.partials.footer')
        <!-- Footer -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script>
        var resizefunc = [];
    </script>
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    {{-- bootstrap js  --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/backend/js/detect.js') }}"></script>
    <script src="{{ asset('assets/backend/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/backend/js/waves.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('assets/backend/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <!-- Counter Up  -->
    <script src="{{ asset('assets/backend/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/counterup/jquery.counterup.js') }}"></script>
    <!-- Page specific js -->
    <script src="{{ asset('assets/backend/pages/jquery.dashboard.js') }}"></script>
    <script src="{{ asset('assets/backend/js/backend.js') }}"></script>
    <!-- iziToast Js -->
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
    <!-- App js -->
    <script src="{{ asset('assets/backend/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.app.js') }}"></script>
    <!-- yield another page js -->
    @stack('page-js')
    @livewireScripts
</body>

</html>
