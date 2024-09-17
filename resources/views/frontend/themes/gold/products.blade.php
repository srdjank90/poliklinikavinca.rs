@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Proizvodi')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs Section -->
    <div class="breadcrumbs_area product_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            @if (isset($selectedCategory))
                                <li>></li>
                                <li>{{ $selectedCategory->name }}</li>
                            @else
                                <li>></li>
                                <li>Proizvodi</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs Section -->

    <!-- Products -->
    <div class="shop_area shop_fullwidth shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="p-4 mb-3" src="/themes/gold/assets/img/ponude.webp" alt="ponude">
                </div>
                <div class="col-12 col-md-8  pt-4">
                    @if (isset($selectedCategory))
                        <h1 class="text-start mb-3">
                            {{ $selectedCategory->name }}
                        </h1>
                        {!! $selectedCategory->description !!}
                    @else
                        <h1 class="text-start mb-3">
                            Svi zlatni proizvodi
                        </h1>
                        <p>
                            Investiciono zlato iz naše ponude u skladu je sa svim standardima Udruženja učesnika tržišta
                            dragocenih metala iz Londona (,,London Bullion Market Association” ili,,LBMA”). Ovo globalno
                            prepoznato i priznato udruženje propisuje <b> striktne standarde za nabavku, preradu,
                                proizvodnju i
                                trgovinu zlatom na globalnom nivou.</b>
                        </p>
                        <p>
                            <b> Naše zlatne poluge, zlatne pločice i zlatni dukati tzv. zlatnici </b> uvezeni su legalno u
                            skladu sa
                            svim
                            zakonom propisanim dozvolama, uz završen carinski postupak. <b> Nudimo opciju avansne kupovine
                                investicionog zlata koja je još povoljnija za samog kupca.</b>
                        </p>
                    @endif
                </div>
                <div class="col-12">


                    <div class="shop_toolbar">
                        <div class="orderby_wrapper">
                            <div class="page_amount">
                                <p><a class="home-products-items-button" href="javascript:void(0)">Svi zlatni
                                        proizvodi</a></p>
                            </div>
                            <div class="page_amount">
                                <p><a class="home-blog-items-button" href="javascript:void(0)">Saveti stručnjaka</a></p>
                            </div>
                        </div>
                        <div class="orderby_wrapper">
                            <div class="page_amount">
                                <p>Ukupno {{ count($products) }} proizvod/a</p>
                            </div>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row products-list">
                        <div class="col-12">
                            <div class="page_amount">
                                @if (isset($selectedCategory) && $selectedCategory->slug == 'srebrne-poluge')
                                    <form class="" action="#">
                                        <select name="selected-category" class="selected-category pull-right mb-2"
                                            id="selectedCategory">
                                            <option selected value="{{ $selectedCategory->slug }}">
                                                {{ $selectedCategory->name }}</option>
                                        </select>
                                    </form>
                                @else
                                    <form class="" action="#">
                                        <select name="selected-category" class="selected-category pull-right mb-2"
                                            id="selectedCategory">
                                            <option value="">Svi zlatni proizvodi</option>
                                            @foreach ($productCategoriesFavorite as $category)
                                                <option
                                                    {{ isset($selectedCategory) && $selectedCategory->slug == $category->slug ? 'selected' : '' }}
                                                    value="{{ $category->slug }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                @endif

                            </div>
                        </div>
                        @foreach ($products as $product)
                            <div class="col-6 col-lg-3 col-md-3">
                                <x-products.item :product="$product" />
                            </div>
                        @endforeach
                        @if (count($products) == 0)
                            <div class="col-6">
                                <h4 class="text-center">
                                    @if (isset($selectedCategory))
                                        Nema proizvoda u izabranoj kategoriji
                                    @else
                                        Nema proizvoda
                                    @endif
                                </h4>
                            </div>
                        @endif
                    </div>

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
                                                    <div class="post_title fs-3"><a
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
                                        <h3 class="text-center">Trenutno nema saveta stručnjaka</h3>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Products -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $('.home-products-items-button').on('click', function() {
                $('.blog-list').addClass('d-none')
                $('.products-list').removeClass('d-none')
                $('.home-products-items-button').addClass('fw-bold')
                $('.home-blog-items-button').removeClass('fw-bold')
            })

            $('.home-blog-items-button').on('click', function() {
                $('.blog-list').removeClass('d-none')
                $('.products-list').addClass('d-none')
                $('.home-products-items-button').removeClass('fw-bold')
                $('.home-blog-items-button').addClass('fw-bold')
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
        });
    </script>
@endsection
