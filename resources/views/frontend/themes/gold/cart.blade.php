@extends('frontend.themes.gold.layout.layout')
@section('canonical', url()->current())
@section('robots', 'noindex,nofollow')
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1>Korpa</h3>
                            <ul>
                                <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                                <li>></li>
                                <li>Korpa</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- Cart Section -->
    <div class="shopping_cart_area">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Obriši</th>
                                            <th class="product_thumb">Slika</th>
                                            <th class="product_name">Proizvod</th>
                                            <th class="product-price">Cena</th>
                                            <th class="product_quantity">Količina</th>
                                            <th class="product_total">Ukupno</th>
                                        </tr>
                                    </thead>
                                    <tbody class="products-row">
                                        <tr class="d-none">
                                            <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb"><a href="#"><img
                                                        src="assets/img/s-product/product.jpg" alt=""></a></td>
                                            <td class="product_name"><a href="#">Handbag fringilla</a></td>
                                            <td class="product-price">£65.00</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="0"
                                                    max="100" value="1" type="number"></td>
                                            <td class="product_total">£130.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-table-mobile">
                                <div class="row products-row-mobile d-none">

                                </div>
                            </div>
                            <div class="cart_submit">

                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="coupon_code left d-none">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Završni iznosi</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal d-none">
                                        <p>Međuzbir</p>
                                        <p class="cart_amount subtotal-price"></p>
                                    </div>
                                    <div class="cart_subtotal d-none">
                                        <p>Dostava</p>
                                        <p class="cart_amount shipping-price">Besplatna</p>
                                    </div>

                                    <div class="cart_subtotal">
                                        <p>Ukupno</p>
                                        <p class="cart_amount subtotal-price"></p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{ route('frontend.checkout') }}">Nastavi na plaćanje</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!-- #Cart Section -->
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
            let productsRowMobile = $(".products-row-mobile");
            let productsHtml = "";
            let productsHtmlMobile = '';

            cart.products.forEach(product => {
                subtotalPrice += product.price * product.quantity;
                subtotalQuantity += product.quantity

                let pMetaString = '';
                product.meta.forEach(pMeta => {
                    pMetaString += pMeta.valueId + "-"
                });

                if (pMetaString == '') {
                    pMetaString = product.id
                }

                productsHtml += `<tr class="cart-page-item-` + product.id + `-meta-` + pMetaString + `">
                                    <td class="product_remove"><a class="remove-from-cart" data-id="${product.id}" data-meta="${pMetaString}" href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img style="width:160px" src="` +
                    APP_STORAGE_URL + product
                    .files[0].path + `" alt=""></a></td>
                                    <td class="product_name"><a href="#">${product.name}</a></td>
                                    <td class="product-price">${formatPrice(product.price)}</td>
                                    <td class="product_quantity"><label>Količina</label> <input data-id="${product.id}" data-meta="${pMetaString}" class="cart-quantity-item" min="1" value="${product.quantity}" type="number"></td>
                                    <td class="product_total product-total-` + product.id + `-meta-` + pMetaString + `">${formatPrice(product.price * product.quantity)}</td>
                                </tr>`

                productsHtmlMobile += `<div class="col-12 cart-page-item-` + product.id + `-meta-` +
                    pMetaString +
                    `"><div class="row">
                                    <div class="col-12 product_remove"><a class="remove-from-cart" data-id="${product.id}" data-meta="${pMetaString}" href="#"><i class="fa fa-trash-o"></i></a></div>
                                    <div class="col-12 product_thumb"><a href="#"><img style="width:160px" src="` +
                    APP_STORAGE_URL + product
                    .files[0].path + `" alt=""></a></div>
                                    <div class="col-12 product_name"><a href="#">${product.name}</a></div>
                                    <div class="col-12 product-price">${formatPrice(product.price)}</div>
                                    <div class="col-12 d-flex justify-content-between product_quantity"><label>Količina</label> <input data-id="${product.id}" data-meta="${pMetaString}" class="cart-quantity-item" min="1" value="${product.quantity}" type="number"></div>
                                    <div class="col-12 product_total product-total-` + product.id + `-meta-` +
                    pMetaString + `">${formatPrice(product.price * product.quantity)}</div>
                                </div>
                                </div>`
            })

            totalPrice = subtotalPrice + shippingPrice

            // Set prices
            subtotalQuantityPlace.html(subtotalQuantity)
            subtotal.html(formatPrice(subtotalPrice) + ' ');
            shipping.html(formatPrice(shippingPrice));
            shippingPriceInfo.html(formatPrice(shippingPrice));
            total.html(formatPrice(totalPrice))

            productsRow.append(productsHtml)
            productsRowMobile.append(productsHtmlMobile)

            $(document).on('change', '.cart-quantity-item', function() {
                let quantityValue = $(this).val();
                let id = $(this).data('id');
                let metaString = $(this).data('meta')
                if (!metaString) {
                    metaString = id
                }

                let totalProductsNumber = 0;
                let subtotalPrice = 0;
                let totalPrice = 0;
                cart.products.forEach(p => {
                    if (metaStringGenerate(p) == metaString) {
                        p.quantity = quantityValue
                        $('.product-total-' + id + '-meta-' + metaString).html(formatPrice(p.price *
                            p.quantity))
                    }
                    totalProductsNumber = totalProductsNumber + parseInt(p.quantity)
                    subtotalPrice += p.price * p.quantity;
                });

                // Update Chart Number
                cartNumberContainer.html("")
                cartNumberContainer.html(`<span class="cart_quantity">${totalProductsNumber}</span>`)

                // Update Total Cart
                calculateTotalCart(cart.products)

                // Update Subtotal Price
                subtotal.html(formatPrice(subtotalPrice) + ' ');

                // Update Total Price
                totalPrice = shippingPrice + subtotalPrice
                total.html(formatPrice(totalPrice))

                // Update products in LocalStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                // Update Cart Sidebar
                drawCartItems(cart.products)
            })

        });
    </script>
@endsection
