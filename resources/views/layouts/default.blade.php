<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Your Turnkey EV Charging Solution - {{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/cropped-vehya_6-32x32.png" sizes="32x32" />
    <link rel="icon" href="/img/cropped-vehya_6-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="/img/cropped-vehya_6-180x180.png" />
    <meta name="msapplication-TileImage" content="/img/cropped-vehya_6-270x270.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/custom.css">
    <!--link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<script src="js/jquery-2.2.4.min.js"></script-->
</head>

<body>
    <div id="app">
        @include('partials.front_menu')
        <!-- Header Html end -->
        @yield('content')
        @include('partials.footer')
    </div>
    <!--script src="{{ asset('js/app.js') }}" defer></script -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('scripts')

</body>

</html>