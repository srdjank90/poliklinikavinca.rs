@extends('frontend.themes.modern-2023.layout.layout')


@if (isset($action))
    @section('title', $action->name)
@elseif(isset($selectedCategory))
    @section('title', $selectedCategory->name)
@else
    @section('title', 'Proizvodi')
@endif

@section('description', '')
@section('keywords', '')
@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            @if (isset($selectedCategory))
                                <li class="breadcrumb-item"><a
                                        href="{{ route('frontend.products') }}">{{ __('Products') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $selectedCategory->name }}</li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Products') }}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="text-center py-13">
                <div class="container">
                    @if (isset($action))
                        <h2 class="mb-0">{{ $action->name }} - {{ $action->discount }}% popusta</h2>
                    @elseif(isset($selectedCategory))
                        <h2 class="mb-0">{{ $selectedCategory->name }}</h2>
                    @else
                        <h2 class="mb-0">{{ __('Products') }}</h2>
                    @endif
                </div>
            </div>
        </section>

        <div class="container container-xxl pb-16 pb-lg-18 mb-lg-3">
            <div class="row gy-50px">
                @foreach ($products as $key => $product)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                                <a href="{{ route('frontend.product', $product->slug) }}" class="hover-zoom-in d-block"
                                    title="{{ $product->name }}">
                                    <img src="#" title="{{ $product->slug }}" alt="{{ $product->slug }}"
                                        data-src="{{ $storageUrl . $product->files[0]['path'] }}"
                                        class="img-fluid lazy-image" alt="{{ $product->name }}" style="object-fit: contain"
                                        width="330" height="440">
                                </a>
                                @if (isset($product->action))
                                    <div class="position-absolute product-flash z-index-2" style="top:50px">
                                        <span class="badge badge-product-flash on-sale bg-info">
                                            {{ $product->action }}
                                        </span>
                                    </div>
                                @endif
                                @if (isset($product->price_old) && $product->price_old > 0)
                                    <div class="position-absolute product-flash z-index-2">
                                        <span class="badge badge-product-flash on-sale bg-primary">
                                            Ušteda
                                            {{ round(100 - ($product->price / $product->price_old) * 100) }}
                                            %
                                        </span>
                                    </div>
                                @endif
                            </figure>
                            <div class="card-body text-center p-0">
                                <span
                                    class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    @if ($product->price_old)
                                        <del class=" text-body fw-500 me-4 fs-13px">@priceFormat($product->price_old)
                                            {{ $currency }}</del>
                                    @endif
                                    <ins class="text-decoration-none">@priceFormat($product->price) {{ $currency }}</ins>
                                </span>
                                <h4
                                    class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                    <a class="text-decoration-none text-reset"
                                        href="{{ route('frontend.product', $product->slug) }}">{{ $product->name }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
