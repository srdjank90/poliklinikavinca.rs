@extends('frontend.themes.modern-2023.layout.layout')
@section('title', isset($product->seo->title) ? $product->seo->title : $product->name)
@section('description', isset($product->seo->description) ? $product->seo->description : '')
@section('keywords', isset($product->seo->keywords) ? $product->seo->keywords : '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a title="Home"
                                    href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a title="Proizvodi"
                                    href="{{ route('frontend.products') }}">{{ __('Products') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <div>
            @if ($product->highlighted)
                <div id="landingContent" class="container p-5 mt-5">
                    @if (count($landing) > 0)
                        <h3 class="m-3 text-center mb-5">{{ $product->name }}</h3>
                    @endif
                    @foreach ($landing as $item)
                        @if ($item->imagePosition == 'left')
                            <div class="row mb-lg-18 mb-15 pb-3 align-items-center">
                                <div class="col-lg-6 pe-lg-0">
                                    <div class="card border-0 hover-zoom-in rounded-0">
                                        <div class="image-box-4">
                                            @if (isset($item->image))
                                                <img class="img-fluid w-100 loaded" title="{{ $product->slug }}"
                                                    alt="{{ $product->slug }}" src="{{ $storageUrl }}{{ $item->image }}"
                                                    data-src="{{ $storageUrl }}{{ $item->image }}" width="960"
                                                    height="640" alt="" loading="lazy" data-ll-status="loaded">
                                            @endif
                                        </div>
                                        <div class="d-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 px-lg-12 ps-xl-18 pe-xl-20 mt-12 mt-lg-0">
                                    <h3 class="mb-8">{{ $item->title }}</h3>
                                    <p class="mb-0">{!! $item->text !!}</p>
                                </div>
                            </div>
                        @endif
                        @if ($item->imagePosition == 'right')
                            <div class="row mb-lg-18 mb-15 pb-3 align-items-center">
                                <div class="col-lg-6 px-lg-12 ps-xl-18 pe-xl-20 mt-12 mt-lg-0">
                                    <h3 class="mb-8">{{ $item->title }}</h3>
                                    <p class="mb-0">{!! $item->text !!}</p>
                                </div>
                                <div class="col-lg-6 pe-lg-0">
                                    <div class="card border-0 hover-zoom-in rounded-0">
                                        <div class="image-box-4">
                                            @if (isset($item->image))
                                                <img class="img-fluid w-100 loaded" title="{{ $product->slug }}"
                                                    alt="{{ $product->slug }}"
                                                    src="{{ $storageUrl }}{{ $item->image }}"
                                                    data-src="{{ $storageUrl }}{{ $item->image }}" width="960"
                                                    height="640" alt="" loading="lazy" data-ll-status="loaded">
                                            @endif
                                        </div>
                                        <div class="d-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($item->imagePosition == 'none')
                            <div class="row mb-lg-18 mb-15 pb-3 align-items-center">
                                <div class="col-md-12 px-lg-3 ps-xl-3 pe-xl-3 mt-12 mt-lg-0">
                                    <h3 class="mb-8">{{ $item->title }}</h3>
                                    <p class="mb-0">{!! $item->text !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        <section class="container container-xxl pt-6 pb-13 pb-lg-20">
            <div class="row ">
                <div class="col-md-6 col-xl-6 pe-lg-13 pb-12 pe-md-0">
                    <div class="slick mx-5">
                        @foreach ($product->files as $image)
                            <div>
                                <img title="{{ $product->slug }}" alt="{{ $product->slug }}"
                                    src="{{ $storageUrl . $image->path }}" data-src="{{ $storageUrl . $image->path }}"
                                    class="" width="448" height="579" alt>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 pt-md-0 pt-10">
                    <p class="d-flex align-items-center mb-6">
                        @if ($product->price_old)
                            <span class="text-decoration-line-through">@priceFormat($product->price_old) {{ $currency }}</span>
                        @endif
                        <span class="fs-18px text-body-emphasis ps-6 fw-bold">@priceFormat($product->price) {{ $currency }}</span>

                        @if (isset($product->price_old) && $product->price_old > 0)
                            <span class="badge text-bg-primary fs-6 fw-semibold ms-7 px-6 py-3">
                                Ušteda
                                {{ round(100 - ($product->price / $product->price_old) * 100) }}
                                %
                            </span>
                        @endif
                    </p>
                    <h1 class="mb-4 pb-2 fs-4">{{ $product->name }}</h1>
                    @if ($product->action)
                        <div class="card border border-2 border-primary rounded mb-8">
                            <div class="card-body py-6 px-9">
                                <div class="d-flex align-items-center">
                                    <img src="/themes/modern-2023/assets/images/shop/product-info-fire.jpg" alt="hot">
                                    <p class="fs-4 text-body-emphasis fw-semibold mb-0 ms-4 ps-2">{{ $product->action }}
                                    </p>
                                </div>
                                <p class="card-text mb-3">{{ $product->actionDescription }}</p>
                                <div class="countdown d-flex flex-wrap align-items-center text-primary fw-semibold mb-2 pb-4"
                                    data-countdown="true" data-countdown-end="{{ $product->actionDate }}">
                                    <span class="countdown-item day fs-4 fs-lg-48px">105</span>
                                    <span class="fs-4 fw-bold mx-4 mx-lg-8">:</span>
                                    <span class="countdown-item hour fs-4 fs-lg-48px">06</span>
                                    <span class="fs-4 fw-bold mx-4 mx-lg-8">:</span>
                                    <span class="countdown-item minute fs-4 fs-lg-48px">22</span>
                                    <span class="fs-4 fw-bold mx-4 mx-lg-8">:</span>
                                    <span class="countdown-item second fs-4 fs-lg-48px">31</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <p class="fs-15px">
                        {{ $product->excerpt }}
                    </p>
                    <form id="itemForm" class="pb-8 meta-items">
                        <!-- Product Meta -->
                        @foreach ($productMetas as $key => $metaOption)
                            @if ($metaOption['name'] !== 'Dimenzija')
                                <div class="mb-2 py-2 meta-item">
                                    <h6>{{ $metaOption['name'] }} </h6>
                                    @foreach ($product->meta as $pmKey => $meta)
                                        @if ($meta->type == $metaOption['name'])
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" required
                                                    onchange="changeMetaValue('{{ $meta->type }}','{{ $meta->name }}','{{ $meta->id }}')"
                                                    value="{{ $meta->id }}" type="radio"
                                                    name="{{ $metaOption['name'] }}"
                                                    id="meta{{ $meta->type . $meta->id }}">
                                                <label class="form-check-label" for="meta{{ $meta->type . $meta->id }}">
                                                    {{ $meta->name }}
                                                    @if (isset($metaOption['valueType']) && $metaOption['valueType'] != '')
                                                        <img width="48"
                                                            src="{{ $storageUrl }}/{{ $meta->value }}"
                                                            alt="">
                                                    @endif
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="form-group shop-swatch mb-7 d-flex align-items-center">
                                    <span class="fw-semibold text-body-emphasis me-7">{{ $metaOption['name'] }}: </span>
                                    <ul class="list-inline d-flex justify-content-start mb-0">
                                        @foreach ($product->meta as $pmKey => $meta)
                                            @if ($meta->type == $metaOption['name'])
                                                <li class="list-inline-item me-4 fw-semibold">
                                                    <input required
                                                        onchange="changeMetaValue('{{ $meta->type }}','{{ $meta->name }}','{{ $meta->id }}')"
                                                        value="{{ $meta->id }}" type="radio"
                                                        name="{{ $metaOption['name'] }}"
                                                        id="meta{{ $meta->type . $meta->id }}"
                                                        class="product-info-size d-none" checked="">
                                                    <label
                                                        onclick="changeMetaValue('{{ $meta->type }}','{{ $meta->name }}','{{ $meta->id }}')"
                                                        for="meta{{ $meta->type . $meta->id }}"
                                                        class="fs-14px p-4 d-block rounded text-decoration-none border product-info-size-label"
                                                        data-var="{{ $meta->name }}">{{ $meta->name }}</label>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                        @endforeach
                        <!-- #Product Meta -->


                        <div class="row align-items-end">
                            <div class="form-group col-sm-4">
                                <label class=" text-body-emphasis fw-semibold fs-15px pb-6"
                                    for="number">{{ __('Quantity') }}:
                                </label>
                                <div class="input-group position-relative w-100 input-group-lg">
                                    <a href="#"
                                        class="shop-down position-absolute translate-middle-y top-50 start-0 ps-7 product-info-2-minus"><i
                                            class="far fa-minus"></i></a>
                                    <input name="number" type="number" id="number"
                                        class="product-info-2-quantity form-control w-100 px-6 text-center quantity-input"
                                        value="1" required>
                                    <a href="#"
                                        class="shop-up position-absolute translate-middle-y top-50 end-0 pe-7 product-info-2-plus"><i
                                            class="far fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8 pt-9 mt-2 mt-sm-0 pt-sm-0">
                                <button type="button" data-product="{{ $product }}"
                                    class="btn-hover-bg-primary btn-hover-border-primary btn btn-lg btn-dark w-100 add-to-cart">
                                    {{ __('Add to Cart') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="single-product-meta list-unstyled border-top pt-7 mt-7">
                        <li class="d-flex mb-4 pb-2 align-items-center d-none">
                            <span class="text-body-emphasis fw-semibold fs-14px">Sku:</span>
                            <span class="ps-4">SF09281</span>
                        </li>
                        <li class="d-flex mb-4 pb-2 align-items-center d-none">
                            <span class="text-body-emphasis fw-semibold fs-14px">{{ __('Categories') }}:</span>
                            <span class="ps-4">
                                @foreach ($product->categories as $key => $category)
                                    {{ $category->name }},
                                @endforeach
                            </span>
                        </li>
                    </ul>
                    <div class="mt-13">
                        @if ($product->highlighted)
                            <h4>Tehničke Karakteristike</h4>
                        @else
                            <h4>{{ __('Description') }}</h4>
                        @endif

                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </section>
        <div class="border-top w-100 h-1px"></div>
    </main>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            //$('.meta-item input:radio:first-child').attr('checked', true).trigger('click');
            $(".form-check-input").click();
            $(".product-info-size-label").click();

            $('.slick').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                prevArrow: '<div class="slick-prev" aria-label="Prev"><svg class="icon"><use xlink:href="#icon-chevron-left"></use></svg></div>',
                nextArrow: '<div class="slick-next" aria-label="Next"><svg class="icon"><use xlink:href="#icon-chevron-right"></use></svg></div>',
                responsive: [{
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }]
            });
        });
    </script>
@endsection
