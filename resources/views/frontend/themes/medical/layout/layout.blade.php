<!DOCTYPE html>
<html lang="sr-Latn">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Poliklinika Vinča')</title>
    <meta name="description" content="@yield('description', '')" />
    <meta name="keywords" content="@yield('keywords', '')" />
    <meta name="author" content="SK" />

    <!-- OG Tags -->
    <meta property="og:title" content="@yield('ogTitle', 'Poliklinika Vinča')" />
    <meta property="og:image" content="@yield('ogImage', '')" />
    <meta property="og:image" content="https://poliklinika.cfd/themes/medical/assets/img/poliklinika-vinca.webp" />
    <meta property="og:description" content="@yield('ogDescription', '')" />
    <meta property="og:url" content="@yield('ogUrl', '')" />
    <meta property="og:type" content="@yield('ogType', 'website')" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/themes/lika/assets/img/icon.png" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.css'
        integrity='sha512-ywmPbuxGS4cJ7GxwCX+bCJweeext047ZYU2HP52WWKbpJnF4/Zzfr2Bo19J4CWPXZmleVusQ9d//RB5bq0RP7w=='
        crossorigin='anonymous' />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'
        integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=='
        crossorigin='anonymous' />
    <link href="/themes/medical/assets/css/styles.css" rel="stylesheet" />
    <meta name="robots" content="index, follow">
</head>

<body class="d-flex flex-column h-100 bg-light">
    <!-- Header -->
    @include('frontend.themes.medical.layout.header')
    <!-- End Header -->
    <main class="flex-shrink-0">
        @yield('content')
    </main>
    <!-- Footer -->
    @include('frontend.themes.medical.layout.footer')
    <!-- End Footer -->
    <!-- Scripts -->
    @include('frontend.themes.medical.layout.scripts')
    <!-- End Scripts -->
    <!-- Additional Scripts -->
    @yield('scripts')
    <!-- End additional scripts-->
</body>

</html>
