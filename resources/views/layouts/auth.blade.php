<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Hero Start -->
    @yield('content')
    <!-- Hero End -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="/backoffice/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/backoffice/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/backoffice/assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Main Js -->
    <script src="/backoffice/assets/js/plugins.init.js"></script>
    <script src="/backoffice/assets/js/app.js"></script>

</body>

</html>
