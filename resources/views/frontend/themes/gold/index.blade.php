@extends('frontend.themes.gold.layout.layout')
@section('canonical', url('/'))
@section('content')
    <!-- Slider -->
    <div class="slider_area home_slider_three owl-carousel">
        <div class="single_slider" data-bgimg="/themes/gold/assets/img/slider/slider5.webp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content">
                            <p>Ekskluzivna ponuda za sve nove kupce</p>
                            <div class="fs-1">C.Hafner zlatne pločice 50g</div>
                            <p class="slider_price">već od <span>431.410,00 dinara</span></p>
                            <a class="button" href="{{ route('frontend.product', 'chafner-50g-zlatna-poluga') }}">više
                                detalja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider" data-bgimg="/themes/gold/assets/img/slider/slider6.webp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content">
                            <p class="text-white">Ekskluzivna ponuda za sve nove kupce</p>
                            <div class="text-white fs-1">Poklon pločice investiciono zlato</div>
                            <p class="slider_price"><span class="text-white">već od</span> <span>19.760,00 dinara</span></p>
                            <a class="button" href="{{ route('frontend.category.products', 'zlatnici-za-poklon') }}">više
                                detalja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Slider -->

    <!-- Baner -->
    <section class="banner_section">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="breadcrumb_content border-none pb-0 text-start border-bottom-0">
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>&gt;</li>
                            <li>Investiciono zlato</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 py-4">
                    <h1>Investiciono zlato</h1>
                    <p>Zlatni Standard svojim klijentima nudi mogućnost blagovremene zaštite kupovne moći kapitala i
                        štednje,
                        kroz kupovinu Fine Gold 999,9/24 karata investicionog zlata i investicionog srebra, u fizičkoj formi
                        pločica i poluga težinskih denominacija od 1g do 1kg, vodećih svetskih proizvođača. Svi proizvodi u
                        našoj ponudi su sertifikovani (LBMA Good Delivery) od strane Udruženja učesnika tržišta dragocenih
                        metala iz Londona (odnosno „London Bullion Market Association“ ili „LBMA“), organizacije koja
                        reguliše i
                        garantuje kvalitet proizvodnje i trgovine dragocenim metalima, uključujući zlato i srebro, na
                        svetskom
                        nivou. Zbog svojih strogih uslova i ugleda koji ima, LBMA svojom sertifikacijom suštinski isključuje
                        mogućnost manipulacije robom (na primer mogućnost da je gramaža manja, ili da dragoceni metal nije
                        ugovorene finoće, itd.). Zlatni Standard u svojoj ponudi ima i zlatne dukate i novčiće popularnih
                        formata, pre svega mali dukat Franc Jozef, veliki dukat Franc Jozef i dukat Bečka Filharmonija.</p>

                    <p>Prvo globalna pandemija, pa zatim rat, rastuća makroekonomska i geopolitička neizvesnost, kao i veoma
                        visoka stopa inflacije izazivaju ozbiljnu finansijsku neizvesnost širom sveta. Svi, kako fizička
                        tako i
                        pravna lica, traže načine da zaštite kupovnu moć svoje imovine tokom predstojeće krize, a potražnja
                        za
                        investicionim proizvodima od zlata i srebra je na rekordnom nivou.</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ route('frontend.product', 'chafner-zlatne-plocice-10g-10x1g') }}"><img
                                    src="/themes/gold/assets/img/baner-1.webp" alt="Chafner zlatne plocice 10g 10x1g"></a>
                            <div class="banner_content">
                                <p>SPECIJALNA PONUDA</p>
                                <div class="fs-2">C.Hafner pločice 10 x 1</div>
                                <span>95.000 dinara</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{ route('frontend.product', 'chafner-zlatne-plocice-20g-10x2g') }}"><img
                                    src="/themes/gold/assets/img/baner-2.webp" alt="Chafner zlatne plocice 20g 10x 2g"></a>
                            <div class="banner_content">
                                <p>SPECIJALNA PONUDA</p>
                                <div class="fs-2">C.Hafner SmartPack 10 x 2g</div>
                                <span>188.000 dinara</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Baner -->

    <!-- Products -->
    <section class="products container pb-5 blog_section mt-5">
        <div class="shop_toolbar">
            <div class="orderby_wrapper">
                <div class="page_amount">
                    <p><a class="home-products-items-button active" href="javascript:void(0)">Svi zlatni proizvodi</a></p>
                </div>
                <div class="page_amount">
                    <p><a class="home-blog-items-button" href="javascript:void(0)">Saveti stručnjaka</a></p>
                </div>
            </div>
            <p>Ukupno {{ count($products) }} proizvod/a</p>
        </div>
        <!--shop toolbar end-->

        <!-- Products List -->
        <div class="row py-3 products-list">
            <div class="col-12">
                <div class="page_amount">
                    <form class="" action="#">
                        <select name="selected-category" class="selected-category pull-right mb-2" id="selectedCategory">
                            <option value="">Svi zlatni proizvodi</option>
                            @foreach ($productCategoriesFavorite as $category)
                                <option
                                    {{ isset($selectedCategory) && $selectedCategory->slug == $category->slug ? 'selected' : '' }}
                                    value="{{ $category->slug }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="col-6 col-lg-3 col-md-3 col-sm-6">
                    <x-products.item :product="$product" />
                </div>
            @endforeach
            @if (count($products) == 0)
                <div>
                    <div class="text-center fs-3">Trenutno nema dostupnih proizvoda</div>
                </div>
            @endif
        </div>
        <!-- $Products List -->

        <!-- Blog List -->
        <div class="blog_area blog_none py-3 blog-list d-none">
            <div class="container">
                <div class="blog_grid_area">
                    @foreach ($expertAdvices as $ePost)
                        <!-- Blog Item -->
                        <div class="blog_grid">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="blog_thumb">
                                        <a href="{{ route('frontend.post', $ePost->slug) }}"><img
                                                src="{{ $storageUrl }}{{ $ePost->image->path }}"
                                                alt="{{ $ePost->title }}"></a>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="blog_content">
                                        <div class="post_title"><a
                                                href="{{ route('frontend.post', $ePost->slug) }}">{{ $ePost->title }}</a>
                                        </div>
                                        <p class="post_desc">
                                            {!! $ePost->excerpt !!}
                                        </p>
                                        <a class="btn-theme-light"
                                            href="{{ route('frontend.post', $ePost->slug) }}">Detaljnije</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #Blog Item -->
                    @endforeach
                    @if (count($expertAdvices) == 0)
                        <div>
                            <div class="text-center fs-3">Trenutno nema saveta stručnjaka</div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!-- #Blog List -->
    </section>
    <!-- #Product -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.home-products-items-button').on('click', function() {
                $('.blog-list').addClass('d-none')
                $('.products-list').removeClass('d-none')
                $('.home-products-items-button').addClass('active')
                $('.home-blog-items-button').removeClass('active')
            })

            $('.home-blog-items-button').on('click', function() {
                $('.blog-list').removeClass('d-none')
                $('.products-list').addClass('d-none')
                $('.home-products-items-button').removeClass('active')
                $('.home-blog-items-button').addClass('active')
            })

            $('.selected-category').on('change', function() {
                let selectedCategorySlug = $(this).val()

                if (selectedCategorySlug) {
                    window.location.href = '/proizvodi/' +
                        selectedCategorySlug; // Assuming routes are named route1, route2, etc.
                } else {
                    window.location.href = '/proizvodi'
                }
            })

        })
    </script>
@endsection
