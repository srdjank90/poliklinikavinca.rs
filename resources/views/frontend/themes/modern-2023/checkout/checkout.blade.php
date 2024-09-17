@extends('frontend.themes.modern-2023.layout.layout')

@section('content')
    <main id="content" class="wrapper layout-page">
        <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a title="Home"
                                    href="{{ route('frontend.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item"><a title="Products"
                                    href="{{ route('frontend.products') }}">{{ __('Products') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Check Out') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="container pb-14 pb-lg-19">
            <div class="text-center">
                <h2 class="mb-6">{{ __('Check Out') }}</h2>
            </div>
            <form id="checkoutForm" class="pt-12" action="{{ route('frontend.checkout.store') }}" method="POST"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                        <div class="card border-0 rounded-0 shadow mb-3">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <h4 class="fs-4 mb-8">{{ __('Order Summary') }}</h4>
                                <div class="products-row">

                                </div>
                            </div>
                            <div class="card-body px-10 py-8">
                                <div class="d-flex align-items-center mb-2">
                                    <span>{{ __('Subtotal') }}:</span>
                                    <span class="d-block ms-auto text-body-emphasis fw-bold subtotal-price"></span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent py-5 px-0 mx-10">
                                <div class="d-flex align-items-center fw-bold mb-6">
                                    <span class="text-body-emphasis p-0">{{ __('Total') }}:</span>
                                    <span class="d-block ms-auto text-body-emphasis fs-4 fw-bold total-price"></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="d-flex flex-column justify-content-center align-items-center mt-10 border p-5 rounded-3">
                            <i class="fa-solid fa-barcode fa-2x"></i>
                            <div class="w-100 text-center">
                                {!! $setting['setting_checkout_info_title_opt'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                        <div class="checkout">
                            <h4 class="fs-4 pt-4 mb-7">{{ __('Shipping Information') }}</h4>
                            <div class="mb-7">
                                <label
                                    class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">{{ __('Name') }}</label>
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-7">
                                        <input type="text" class="form-control" id="first-name" name="first_name"
                                            placeholder="{{ __('First name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="last-name" name="last_name"
                                            placeholder="{{ __('Last name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-7">
                                <div class="row">
                                    <div class="col-md-12 mb-md-0 mb-7">
                                        <label for="street-address"
                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">{{ __('Address') }}</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-7">
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-7">
                                        <label for="city"
                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">{{ __('City') }}</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="zip"
                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">{{ __('Zip') }}</label>
                                        <input type="text" class="form-control" id="zip" name="zip" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-7">
                                <label
                                    class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">{{ __('Info') }}</label>
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-7">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="{{ __('Email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            placeholder="{{ __('Phone') }}" required>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="products" id="products">

                            <div class="d-grid">
                                <button type="button"
                                    class="btn btn-primary btn-lg submit-checkout-btn">{{ __('Confirm Order') }}</button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            let currency = '{{ $currency }}';
            let total = $(".total-price")
            let shipping = $(".shipping-price")
            let subtotal = $(".subtotal-price")
            let subtotalQuantityPlace = $(".checkout-total-quantity")
            let productsJSON = $("#products");
            let shippingPriceInfo = $(".shipping-price-info");

            let totalPrice = 0;
            let subtotalPrice = 0;
            let shippingPrice = 0;
            let subtotalQuantity = 0;

            let cart = JSON.parse(localStorage.getItem('cart'));
            productsJSON.val(JSON.stringify(cart.products))
            let productsRow = $(".products-row");
            let productsHtml = "";

            cart.products.forEach(product => {
                subtotalPrice += product.price * product.quantity;
                subtotalQuantity += product.quantity
                productsHtml += '<div class="d-flex w-100 mb-7">' +
                    '<div class="me-6">' +
                    '<img src="#" data-src="{{ $storageUrl }}' + product.files[0].path + '"' +
                    'class="lazy-image" width="60" height="80"' +
                    'alt="' + product.name + '">' +
                    '</div>' +
                    '<div class="d-flex flex-grow-1">' +
                    '<div class="pe-6">' +
                    '<a href="#" class>' +
                    '' + product.name + '' +
                    '<span class="text-body"> x' + product.quantity + '</span>' +
                    '</a>';
                product.meta.forEach(m => {
                    productsHtml += '       <p class="fs-14px text-body-emphasis mb-0 mt-1">' + m
                        .name + ':';
                    productsHtml += '           <span class="text-body">' + m.value + '</span>';
                    productsHtml += '       </p>';
                });
                productsHtml += '</div>' +
                    '<div class="ms-auto">' +
                    '<p class="fs-14px text-body-emphasis mb-0 fw-bold">' + subtotalPrice + ' ' + currency +
                    '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            })

            if (subtotalPrice > 3999) {
                shippingPrice = 0;
            } else {
                shippingPrice = 390
            }
            totalPrice = subtotalPrice + shippingPrice;

            // Set prices
            subtotalQuantityPlace.html(subtotalQuantity)
            subtotal.html(formatPrice(subtotalPrice) + ' ');
            shipping.html(formatPrice(shippingPrice));
            shippingPriceInfo.html(formatPrice(shippingPrice));
            total.html(formatPrice(totalPrice))

            productsRow.append(productsHtml)

            $(".submit-checkout-btn").on('click', function() {
                console.log('Submit order')
                localStorage.removeItem('cart');
                $("#checkoutForm").submit();
            });

        });
    </script>
@endsection
