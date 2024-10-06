<!DOCTYPE html>
<html lang="sr-Latn">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Poliklinika Vinča')</title>
    <meta name="description" content="@yield('description', '.')" />
    <meta name="keywords" content="@yield('keywords', '')" />
    <meta name="author" content="Allinclusive" />

    <!-- OG Tags -->
    <meta property="og:title" content="@yield('ogTitle', 'Poliklinika Vinča')" />
    <meta property="og:image" content="@yield('ogImage', 'https://poliklinikavinca.rs/themes/medical/assets/img/poliklinika-vinca.webp')" />
    <meta property="og:description" content="@yield('ogDescription', 'Poliklinika Vinča')" />
    <meta property="og:url" content="@yield('ogUrl', '')" />
    <meta property="og:type" content="@yield('ogType', 'website')" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16659687689"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16659687689');
    </script>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1089573011603937');
        fbq('track', 'PageView');
    </script>

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
