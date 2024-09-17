<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="icon" href="/themes/modern-2023/assets/images/others/favicon.png" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/vendors/lightgallery/css/lightgallery-bundle.min.css" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/vendors/slick/slick.css" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/vendors/mapbox-gl/mapbox-gl.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/themes/modern-2023/assets/css/main.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/themes/modern-2023/assets/css/theme.css" />
    <style>
        .badge-product-flash.bg-primary {
            background-color: #d20328 !important;
        }

        .bg-primary {
            background-color: #13a2d5 !important;
        }

        .text-primary {
            color: #13a2d5 !important;
        }

        .btn:hover {
            background-color: #13a2d5;
        }

        .btn-hover-border-primary {
            --bs-btn-hover-border-color: #13a2d5;
        }

        a:hover {
            color: #13a2d5;
        }

        @media only screen and (max-width: 920px) {
            .header-image {
                width: 65% !important
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('frontend.themes.modern-2023.layout.header')
    <!-- #Header -->

    <!-- Main Content -->
    @yield('content')
    <!-- #Main Content -->

    <!-- Footer -->
    @include('frontend.themes.modern-2023.layout.footer')
    <!-- #Footer -->

    <!-- Svg -->
    @include('frontend.themes.modern-2023.layout.svg')
    <!-- #Svg -->

    <!-- Scripts -->
    @include('frontend.themes.modern-2023.layout.scripts')
    <!-- #Scripts -->

    <!-- Additional Scripts -->
    @yield('scripts')
    <!-- #Additional scripts-->
</body>

</html>
