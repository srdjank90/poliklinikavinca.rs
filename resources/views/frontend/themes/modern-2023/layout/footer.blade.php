<footer class="pt-16 pt-lg-19 pb-16 footer">
    <div class="container container-xxl pt-4">
        <div class="row">
            <div class="col-lg-5 col-12 mb-11 mb-lg-0">
                <h3 class="mb-6 text-primary">
                    Obezbedite Vaš stan, kuću, lokal<br />
                    još danas.
                </h3>
                <p>SIGURNO, BEZBEDNO, KVALITETNO - Pismena garancija i servis</p>
                <form class="pt-6 pe-xl-8 form-border-transparent">
                    <div class="input-group position-relative">
                        <input type="email" class="form-control rounded pe-15 lh-1 py-7"
                            placeholder="Ostavite Vaš email" />
                        <button type="submit"
                            class="btn fs-28px bg-transparent text-secondary position-absolute btn-custom px-8 z-index-5 h-100 lh-0">
                            <svg class="icon icon-long-arrow-right">
                                <use xlink:href="#icon-long-arrow-right"></use>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md col-12 mb-11 mb-lg-0 offset-lg-2">
                <h3 class="fs-5 mb-6">TALARIS engineering</h3>
                <ul class="list-unstyled mb-0 fw-medium">
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.about') }}" title="O nama" class="text-body">O nama</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.services') }}" title="Servis" class="text-body">Servis</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.posts') }}" title="Blog" class="text-body">Blog</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.stores') }}" title="Prodajna mesta" class="text-body">Prodajna
                            mesta</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.contact') }}" title="Kontakt" class="text-body">Kontakt</a>
                    </li>
                </ul>
            </div>
            <div class="col-md col-12 mb-11 mb-lg-0">
                <h3 class="fs-5 mb-6">Informacije</h3>
                <ul class="list-unstyled mb-0 fw-medium">
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.page', 'hitne-intervencije') }}" title="Hitne intervencije"
                            class="text-body">Hitne intervencije</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a target="_blank" href="/storage/2023/10/katalog-talaris.pdf" title="Katalog"
                            class="text-body">Katalog</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.page', 'podaci-za-identifikaciju') }}"
                            title="Podaci za identifikaciju" class="text-body">Podaci za
                            identifikaciju</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.page', 'informacije-o-placanju') }}" title="Informacije o plaćanju"
                            class="text-body">Informacije o plaćanju</a>
                    </li>
                    <li class="pt-3 mb-4">
                        <a href="{{ route('frontend.page', 'politika-privatnosti') }}" title="Politika privatnosti"
                            class="text-body">Politika privatnosti</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row align-items-center mt-0 mt-lg-20 pt-lg-2">
            <div
                class="col-sm-12 col-md-8 col-lg-6 d-flex align-items-center order-2 order-lg-1 fs-6 mt-7 mt-md-11 mt-lg-0">
                <p class="mb-0">© Sigurnosna vrata by TALARIS engineering 2023</p>
                <ul class="list-inline fs-18px ms-6 mb-0">
                    <li class="list-inline-item me-8">
                        <a href="https://www.facebook.com/sigurnosnavratabeograd">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item me-8">
                        <a href="https://www.instagram.com/talarisvrata/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/channel/UCx5-VdBuGc3iL8KZ--vxhfQ">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-lg-4 text-md-center order-1 order-lg-2">
                <a class="d-inline-block" href="{{ route('frontend.index') }}">
                    <img class="lazy-image img-fluid light-mode-img" src="#"
                        data-src="/themes/modern-2023/assets/images/logo.jpg" width="50%" />
                </a>
            </div>

        </div>
    </div>
</footer>

<div id="shoppingCart" data-bs-scroll="false" class="offcanvas offcanvas-end cart-container">

</div>

<div class="navbar">
    <div id="offCanvasNavBar" class="offcanvas offcanvas-start" style="--bs-offcanvas-width: 310px">
        <div class="offcanvas-header bg-body-tertiary">
            <h6 class="offcanvas-title text-uppercase">Sigurnosna Vrata</h6>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="mt-0" />
        <div class="offcanvas-body pt-0 mb-2">
            <ul class="navbar-nav">
                <li class="nav-item transition-all-xl-1 py-0 dropdown dropdown-fullwidth d-none">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px dropdown-toggle"
                        href="{{ route('frontend.index') }}" data-bs-toggle="dropdown" id="menu-item-home-canvas"
                        aria-haspopup="true" aria-expanded="false">{{ __('Home') }}</a>
                    <div class="dropdown-menu mega-menu start-0 py-6" aria-labelledby="menu-item-home-canvas"
                        style="width: 320px">
                        <div class="megamenu-home container py-8 px-12">
                            <div class="row">
                                <div class="col">
                                    <h6 class="fs-18px">Group 1</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="home-01.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 01</span></a>
                                        </li>
                                        <li>
                                            <a href="home-02.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 02</span></a>
                                        </li>
                                        <li>
                                            <a href="home-03.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 03</span></a>
                                        </li>
                                        <li>
                                            <a href="home-04.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 04</span></a>
                                        </li>
                                        <li>
                                            <a href="home-05.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 05</span></a>
                                        </li>
                                        <li>
                                            <a href="home-06.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 06</span></a>
                                        </li>
                                        <li>
                                            <a href="home-07.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 07</span></a>
                                        </li>
                                        <li>
                                            <a href="home-08.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 08</span></a>
                                        </li>
                                        <li>
                                            <a href="home-09.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 09</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="fs-18px">Group 2</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="home-10.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 10</span></a>
                                        </li>
                                        <li>
                                            <a href="home-11.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 11</span></a>
                                        </li>
                                        <li>
                                            <a href="home-12.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 12</span></a>
                                        </li>
                                        <li>
                                            <a href="home-13.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 13</span></a>
                                        </li>
                                        <li>
                                            <a href="home-14.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 14</span></a>
                                        </li>
                                        <li>
                                            <a href="home-15.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 15</span></a>
                                        </li>
                                        <li>
                                            <a href="home-16.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 16</span></a>
                                        </li>
                                        <li>
                                            <a href="home-17.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 17</span></a>
                                        </li>
                                        <li>
                                            <a href="home-18.html"
                                                class="border-hover text-decoration-none py-3 d-block"><span
                                                    class="border-hover-target">Home 18</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.products') }}">Webshop</a></li>
                @if ($productAction)
                    <li class="nav-item">
                        <a style="color:#d20328" class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                            href="{{ route('frontend.action.products', $productAction->slug) }}">SUPER
                            UŠTEDA</a>
                    </li>
                @endif
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.about') }}">Talaris</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.services') }}">Servis</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.posts') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.stores') }}">Prodajna mesta</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase fw-semibold ls-1 fs-15px"
                        href="{{ route('frontend.contact') }}">Kontakt</a></li>
            </ul>
        </div>
        <hr class="mb-0" />
        <div class="offcanvas-footer bg-body-tertiary">
            © Sigurnosna vrata by TALARIS engineering 2023
        </div>
    </div>
</div>

<div class="position-fixed z-index-10 bottom-0 end-0 p-10">
    <a href="#"
        class="gtf-back-to-top text-decoration-none bg-body text-primary bg-primary-hover text-light-hover shadow square p-0 rounded-circle d-flex align-items-center justify-content-center"
        title="Back To Top" style="--square-size: 48px"><i class="fa-solid fa-arrow-up"></i></a>
</div>
</body>

</html>
