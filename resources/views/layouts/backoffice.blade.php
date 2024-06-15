<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <!-- favicon -->
    <link rel="shortcut icon" href="/backoffice/assets/images/favicon.png" />
    <!-- Css -->
    <link href="/backoffice/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="/backoffice/assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/backoffice/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/backoffice/assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
    <!-- Style Css-->
    <link href="/backoffice/assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    @yield('style')

</head>

<body>
    <!-- Loader -->
    {{-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> --}}
    <!-- Loader -->

    <div class="page-wrapper {{ request()->routeIs('orders.*') ? '' : 'toggled' }}">
        <!-- sidebar-wrapper -->
        @include('layouts.sidebar')
        <!-- sidebar-wrapper  -->

        <!-- Start Page Content -->
        <main class="page-content bg-light">
            <!-- Top Header -->
            @include('layouts.header')
            <!-- Top Header -->

            @yield('content')

            <!-- Footer Start -->
            <footer class="shadow py-3">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-sm-start text-center mx-md-2">
                                <p class="mb-0 text-muted">©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Linkyi.Shop
                                </p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>
    <!-- page-wrapper -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="/backoffice/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/backoffice/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/backoffice/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/backoffice/assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- Main Js -->
    {{-- <script src="/backoffice/assets/js/plugins.init.js"></script> --}}
    <script src="/backoffice/assets/js/app.js"></script>
    @yield('script')
</body>

</html>
