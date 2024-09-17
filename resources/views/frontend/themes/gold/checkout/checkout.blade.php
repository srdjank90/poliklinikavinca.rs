@extends('frontend.themes.gold.layout.layout')
@section('robots', 'noindex,nofollow')
@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Završi kupovinu</h3>
                        <ul>
                            <li><a href="route('frontend.index')">Početna</a></li>
                            <li>></li>
                            <li>Završi kupovinu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- Checkout Section -->
    <div class="Checkout_section" id="accordion">
        <div class="container">
            <!-- Login -->
            @if (!Auth::user())
                <div class="row">
                    <div class="col-12">
                        <div class="user-actions">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Registrovan korisnik?
                                <a class="Returning" href="/login?page=checkout">Uloguj se</a>

                            </h3>
                        </div>
                    </div>
                </div>
            @endif

            <!-- #Login -->
            <div class="checkout_form">
                <form action="{{ route('frontend.checkout.store') }}" method="POST">
                    <div class="row">

                        @csrf
                        @method('POST')
                        <div class="col-lg-7 col-md-8">
                            <!-- Billing Details -->
                            <div class="order-billing">
                                <h3>Adresa za dostavu</h3>
                                @if (Auth::user())
                                    <div class="choose-address-wrapper">
                                        Moje adrese <a class="btn btn-theme my-3 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#chooseAddressModal">Izaberi adresu</a>

                                    </div>
                                @endif

                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-lg-6 mb-20">
                                        <div class="form-group">
                                            <label>Ime<span>*</span></label>
                                            <input class="form-cotnrol" id="orderFirstName" required type="text"
                                                name="order_first_name">
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-lg-6 mb-20">
                                        <div class="form-group">
                                            <label>Prezime <span>*</span></label>
                                            <input id="orderLastName" type="text" required name="order_last_name">
                                        </div>
                                    </div>
                                    <!-- JMBG -->
                                    <div class="col-lg-12 mb-20">
                                        <div class="form-group">
                                            <label>JMBG <span>*</span></label>
                                            <input class="form-control" id="orderJMBG" required type="text"
                                                name="order_jmbg">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Adresa <span>*</span></label>
                                        <input id="orderAddress" required type="text" name="order_address">
                                    </div>
                                    <!-- City -->
                                    <div class="col-12 mb-20">
                                        <div class="form-group">
                                            <label>Grad <span>*</span></label>
                                            <input class="form-control" id="orderCity" type="text" required
                                                name="order_city">
                                        </div>
                                    </div>
                                    <!-- Order ZIP -->
                                    <div class="col-6 mb-20">
                                        <div class="form-group">
                                            <label>Poštanski broj<span>*</span></label>
                                            <input class="form-control" id="orderZip" type="text" required
                                                name="order_zip">
                                        </div>
                                    </div>
                                    <!-- Order Phone -->
                                    <div class="col-lg-6 mb-20">
                                        <div class="form-group">
                                            <label>Telefon<span>*</span></label>
                                            <input class="form-control" id="orderPhone" type="text" required
                                                name="order_phone">
                                        </div>
                                    </div>
                                    <!-- Order Email -->
                                    <div class="col-lg-12 mb-20">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            @if ($user)
                                                <input class="form-control" value="{{ $user->email }}" required
                                                    id="orderEmail" type="text" name="order_email" readonly>
                                            @else
                                                <input class="form-control" required id="orderEmail" type="text"
                                                    name="order_email">
                                            @endif

                                        </div>
                                    </div>
                                    <!-- Order Note -->
                                    <div class="col-12 mb-20">
                                        <div class="form-group">
                                            <label for="orderNote">Napomena</label>
                                            <textarea class="form-control" id="orderNote" name="order_note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #Billing Details -->
                            <!-- Shipping -->
                            <div class="order-shipping">
                                <h3>Način dostave</h3>
                                <div class="payment_method">
                                    @foreach ($shippings as $sKey => $shipping)
                                        <div class="panel-default my-3">
                                            <input class="shipping-service" data-text="{{ $shipping->name }}"
                                                data-price="{{ $shipping->price }}" id="orderPersonal{{ $shipping->id }}"
                                                name="order_shipping_service_id" type="radio" value="{{ $shipping->id }}"
                                                {{ $sKey == 0 ? 'checked' : '' }}>
                                            <label class="mb-0"
                                                for="orderPersonal{{ $shipping->id }}">{{ number_format($shipping->price, 2) }}
                                                {{ $currency }}
                                                - {{ $shipping->name }}</label>
                                            <p>{{ $shipping->description }}</p>
                                        </div>
                                    @endforeach
                                    @if (count($shippings) == 0)
                                        <div>{{ __('Shipping methods are missing') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!-- #Shipping -->
                        </div>

                        <div class="col-lg-5 col-md-4">
                            <!-- Payment Type -->
                            <div class="order-payment-methods pb-3">
                                <h3>Način plaćanja</h3>
                                <div class="order-payment-methods-options">
                                    @foreach ($paymentMethods as $mKey => $method)
                                        <div class="panel-default mb-2">
                                            <input class="payment-method" data-text="{{ $method->name }}"
                                                id="paymentMethod{{ $method->id }}" name="order_payment_method_id"
                                                type="radio" value="{{ $method->id }}"
                                                {{ $mKey == 0 ? 'checked' : '' }}>
                                            <label class="mb-0"
                                                for="paymentMethod{{ $method->id }}">{{ $method->name }}</label>
                                            <p>{{ $method->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- #Payment Type -->

                            <!-- Order Details -->
                            <div class="order-details">
                                <h3>Vaša porudžbina</h3>
                                <div class="order_table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Proizvod</th>
                                                <th>Ukupno</th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout-products-row">
                                            <tr class="d-none">
                                                <td> Handbag fringilla <strong> × 2</strong></td>
                                                <td> $165.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            </tr>
                                            <tr>
                                                <th>Međuzbir</th>
                                                <td class="subtotal-price"></td>
                                            </tr>
                                            <tr>
                                                <th>Dostava</th>
                                                <td><strong class="shipping-price"></strong> <br> <span
                                                        class="shipping-description">Lično Preuzimanje -
                                                        Preuzimanje proizvoda u prostorijama kompanije Zlatni
                                                        Standard</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>PDV</td>
                                                <td class="pdv-price"></td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Ukupno</th>
                                                <td><strong class="total-price"></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <p style="font-size: 15px;text-align:center;padding-top:10px">Na promet investicionog
                                        zlata ne plaća se PDV saglasno članu 36 b. stav 4. tačka 1. Zakona o PDV-u</p>
                                </div>
                            </div>
                            <!-- #Order Details -->

                            <input type="hidden" name="products" id="products">
                            <div class="order_button">
                                <button class="confirm-order float-end" id="confirmOrder" type="submit"><i
                                        class="fa-solid fa-spinner fa-spin confirm-spin d-none"></i> Potvrdi
                                    kupovinu</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #Checkout Section -->


    <!-- Modal -->
    <div class="modal fade" id="chooseAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Izaberite adresu za dostavu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @if ($user && $user->addresses)
                            @foreach ($user->addresses as $address)
                                <div class="col-6 mb-2">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            @if ($address->primary)
                                                <span
                                                    style="position: absolute;
                                                top: -13px;
                                                background: white;
                                                padding: 0px 10px;">Primarna</span>
                                            @endif

                                            <span>{{ $address->first_name }} {{ $address->last_name }}</span> <br>
                                            <span>{{ $address->address }}</span> <br>
                                            <span>{{ $address->zip }},
                                                {{ $address->city }}</span> <br>
                                            <span>{{ $address->phone }}</span> <br>
                                            <button data-id="{{ $address->id }}"
                                                data-fname="{{ $address->first_name }}"
                                                data-lname="{{ $address->last_name }}" data-jmbg="{{ $address->jmbg }}"
                                                data-address="{{ $address->address }}" data-zip="{{ $address->zip }}"
                                                data-city="{{ $address->city }}" data-phone="{{ $address->phone }}"
                                                data-note="{{ $address->note }}"
                                                class="btn btn-primary btn-sm mt-2 w-100 address-choose">Izaberi</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            let currency = '{{ $currency }}';
            let total = $(".total-price")
            let shipping = $(".shipping-price")
            let subtotal = $(".subtotal-price")
            let pdv = $(".pdv-price")
            let subtotalQuantityPlace = $(".checkout-total-quantity")
            let productsJSON = $("#products");
            let shippingPriceInfo = $(".shipping-price-info");
            var user = @json($user);

            let totalPrice = 0;
            let subtotalPrice = 0;
            let shippingPrice = 0;
            let subtotalQuantity = 0;
            let pdvPrice = 0;

            let cart = JSON.parse(localStorage.getItem('cart'));
            productsJSON.val(JSON.stringify(cart.products))
            let checkoutProductsRow = $(".checkout-products-row");
            let checkoutProductsHtml = "";

            // Prepare products html

            cart.products.forEach(product => {
                let productPDV = 0;
                // If silver then we need to split it to PDV
                if (product.name.includes('Srebrn')) {
                    productPDV = product.price * 0.2 * parseInt(product.quantity)
                    product.price = product.price * 0.8
                }
                subtotalPrice += product.price * product.quantity;
                subtotalQuantity += product.quantity
                checkoutProductsHtml += `<tr>
                                            <td> ${product.name} <strong> × ${product.quantity}</strong></td>
                                            <td> ${formatPrice(product.price * parseInt(product.quantity))}</td>
                                        </tr>`;
                pdvPrice += productPDV
            })

            totalPrice = parseInt(subtotalPrice) + parseInt(pdvPrice) + parseInt(shippingPrice);

            // Set prices
            subtotalQuantityPlace.html(subtotalQuantity)
            subtotal.html(formatPrice(subtotalPrice) + ' ');
            shipping.html(formatPrice(shippingPrice));
            shippingPriceInfo.html(formatPrice(shippingPrice));
            pdv.html(formatPrice(pdvPrice))
            total.html(formatPrice(totalPrice))

            checkoutProductsRow.append(checkoutProductsHtml)

            // Disable shipping service if cart is greater than 200000rsd, leave only personal take
            if (totalPrice > 200000) {
                $('input[type="radio"][name="order_shipping_service_id"]').prop('disabled', true);
                $('input[type="radio"][name="order_shipping_service_id"]').parent().addClass('d-none');
                $('#orderPersonal1').prop('disabled', false);
                $('#orderPersonal1').parent().removeClass('d-none');
            }

            checkAvansAmount()

            // Remove cart object from local storage
            $(".submit-checkout-btn").on('click', function() {
                //localStorage.removeItem('cart');
                //$("#checkoutForm").submit();
            });

            // Choose address for package
            $('.address-choose').on('click', function() {
                let firstName = $(this).data('fname');
                let lastName = $(this).data('lname');
                let jmbg = $(this).data('jmbg');
                let address = $(this).data('address');
                let zip = $(this).data('zip');
                let city = $(this).data('city');
                let phone = $(this).data('phone');

                $('#orderFirstName').val(firstName)
                $('#orderLastName').val(lastName)
                $('#orderAddress').val(address)
                $('#orderZip').val(zip)
                $('#orderJMBG').val(jmbg)
                $('#orderCity').val(city)
                $('#orderPhone').val(phone)
                $("#chooseAddressModal").modal('hide');
            })

            // Turn on spinner for order
            $('.confirm-order').on('click', function() {
                $('.confirm-spin').removeClass('d-none');
            })

            // Populate user data with primary address if user is logged in
            if (user) {
                let primaryAddress = user.addresses.find(function(obj) {
                    return obj.primary == 1;
                });

                if (primaryAddress) {
                    $('#orderFirstName').val(primaryAddress.first_name)
                    $('#orderLastName').val(primaryAddress.last_name)
                    $('#orderAddress').val(primaryAddress.address)
                    $('#orderZip').val(primaryAddress.zip)
                    $('#orderJMBG').val(primaryAddress.jmbg)
                    $('#orderCity').val(primaryAddress.city)
                    $('#orderPhone').val(primaryAddress.phone)
                    $('#orderEmail').val(user.email)
                }
            }

        });
    </script>
@endsection
