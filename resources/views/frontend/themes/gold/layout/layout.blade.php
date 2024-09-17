<!DOCTYPE html>
<html lang=”sr-RS”>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="@yield('canonical')" />
    <meta name="robots" content="@yield('robots', 'index,follow')">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/themes/gold/assets/img/favicon.ico" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/themes/gold/assets/css/plugins.css" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/themes/gold/assets/css/style.css" />
    <!-- Modernizr min js here-->
    <script src="/themes/gold/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    @yield('schema')
</head>

<body>
    <!-- Header -->
    @include('frontend.themes.gold.layout.header')
    <!-- End Header -->
    <div class="off_canvars_overlay"></div>
    <main id="content" role="main">
        @yield('content')
    </main>
    <!-- Footer -->
    @include('frontend.themes.gold.layout.footer')
    <!-- End Footer -->

    <!-- Scripts -->
    @include('frontend.themes.gold.layout.scripts')
    <!-- End Scripts -->
    <!-- Additional Scripts -->
    @yield('scripts')
    <!-- End additional scripts-->
</body>

</html>
