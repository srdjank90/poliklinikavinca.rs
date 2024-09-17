<!-- Plugins JS -->
<script src="/themes/gold/assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="/themes/gold/assets/js/popper.js"></script>
<script src="/themes/gold/assets/js/bootstrap.min.js"></script>
<script src="/themes/gold/assets/js/plugins.js"></script>
<script src="/themes/gold/assets/js/owl.carousel.main.js"></script>
<script src="/themes/gold/assets/js/jquery.nice.select.js"></script>
<script src="/themes/gold/assets/js/scrollup.js"></script>
<script src="/themes/gold/assets/js/ajax.chimp.js"></script>
<script src="/themes/gold/assets/js/jquery.ui.js"></script>
<script src="/themes/gold/assets/js/jquery.elevatezoom.js"></script>
<script src="/themes/gold/assets/js/imagesloaded.js"></script>
<script src="/themes/gold/assets/js/isotope.main.js"></script>
<script src="/themes/gold/assets/js/jqquery.ripples.js"></script>
<script src="/themes/gold/assets/js/jquery.cookie.js"></script>
<script src="/themes/gold/assets/js/bpopup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Main JS -->
<script src="/themes/gold/assets/js/main.js"></script>

<!-- Chart Scripts -->
<script>
    $('select').niceSelect()

    function avansPriceTime() {
        // Get current time in Belgrade timezone
        var now = new Date();
        var utcOffset = now.getTimezoneOffset();
        var belgradeOffset = -60; // Belgrade timezone offset from UTC is UTC+1 (UTC offset -60 minutes due to DST)
        var belgradeTime = new Date(now.getTime() + (belgradeOffset + utcOffset) * 60000);

        // Extract hours and minutes
        var hours = belgradeTime.getHours();
        var minutes = belgradeTime.getMinutes();

        // Check if the time is between 08:00 and 16:00
        if (hours >= 8 && hours < 16) {
            return true;
        } else if (hours === 16 && minutes === 0) { // If it's exactly 16:00, consider it as within the range
            return true;
        } else {
            return false;
        }
    }

    function refreshPageIfMinutesZero() {
        var now = new Date();
        if (now.getMinutes() === 0) {
            location.reload();
        }
    }

    // Call the function every minute
    setInterval(refreshPageIfMinutesZero, 60000);

    let APP_URL = "{{ env('APP_URL') }}";
    let APP_STORAGE_URL = "{{ $storageUrl }}";
    let CURRENCY = "{{ $currency }}";
    let itemSizeId = null
    let itemSizeName = ''
    let itemQuantity = 1
    let cart = JSON.parse(localStorage.getItem('cart')) || {
        products: []
    }
    let meta = @json($productMetas);
    let cartContainer = $(".cart-container");
    let cartNumberContainer = $(".cart-number-container");
    let cartNumberEmpty = '';
    let cartEmpty = `<div class="cart_empty">
                        <h4>Vaša korpa je trentutno prazna!</h4>
                    </div>`;
    let activePrice = 'price';
    let shippingServiceId = null
    let shippingServicePrice = 0
    let shippingServiceText = ''
    let paymentMethodId = null
    let paymentMethodText = ''

    function changeMetaValue(type, value, valueId) {
        meta.forEach(m => {
            if (type == m.name) {
                m.value = value
                m.valueId = valueId
            }
        });
    }

    // Draw Cart Items - drawing items from localstorage cart property to cart
    function drawCartItems(products) {
        let productsHTML = ''
        let totalCart = 0
        products.forEach(product => {
            let productImage = '';
            if (product.files.length > 0) {
                productImage = `<a href="#"><img src="` + APP_STORAGE_URL + product.files[0].path +
                    `" alt="" /></a>`;
            }

            let pMetaString = '';
            product.meta.forEach(pMeta => {
                pMetaString += pMeta.valueId + "-"
            });
            if (pMetaString == '') {
                pMetaString = product.id
            }

            totalCart += product.price;
            productsHTML += `<div class="cart_item cart-item-` + product.id + `-meta-` + pMetaString +
                `">
                                <div class="cart_img">
                                    ${productImage}
                                </div>
                                <div class="cart_info">
                                    <a href="#">${product.name}</a>
                                    <span class="quantity">Količina: ${product.quantity}</span>
                                    <span class="price_cart">${ formatPrice(product.price) } x ${product.quantity}</span>`
            product.meta.forEach(m => {
                productsHTML += '<p class="m-0"> ' + m.name + ': ' + m.value + '</p>';
            });
            productsHTML += `   </div>
                                <div class="cart_remove">
                                    <a class="remove-from-cart" data-id="${product.id}" data-meta="${pMetaString}" href="#"><i class="ion-android-close"></i></a>
                                </div>
                            </div>`;
        });

        let fullCartHTML = productsHTML + `<div class="cart_total">
                                <span>Međuzbir:</span>
                                <span class="subtotal-price"></span>
                            </div>
                            <div class="mini_cart_footer">
                                <div class="cart_button view_cart" >
                                    <a style="color: #3c2415;background: #fdf7e7;" href="{{ route('frontend.cart') }}">Korpa</a>
                                </div>
                                <div class="cart_button checkout">
                                    <a class="active" href="{{ route('frontend.checkout') }}">Plaćanje</a>
                                </div>
                            </div>`

        cartContainer.html("");
        cartContainer.html(fullCartHTML);

        let totalProductsNumber = 0;
        products.forEach(p => {
            totalProductsNumber = totalProductsNumber + parseInt(p.quantity)
        })

        cartNumberContainer.html("");
        cartNumberContainer.html(`<span class="cart_quantity">${totalProductsNumber}</span>`)

        calculateTotalCart(products)

    }

    // Calculate Total Price of Products in Cart
    function calculateTotalCart(products) {
        $('.total-cart').html('')
        totalCart = 0;
        products.forEach(product => {
            totalCart += product.price * product.quantity;
        })
        totalCart += shippingServicePrice
        $('.total-cart').html(formatPrice(totalCart))
        $('.total-price').html(formatPrice(totalCart))
        calculateSubtotal(products)
    }

    // Calculate SUbtotal
    function calculateSubtotal(products) {
        $('.subtotal-price').html('')
        subtotal = 0;
        products.forEach(product => {
            subtotal += product.price * product.quantity;
        })
        $('.subtotal-price').html(formatPrice(subtotal))
    }

    // Product Exists
    function productExist(product, products) {
        let exist = false;
        let pMetaString = '';
        product.meta.forEach(pMeta => {
            pMetaString += pMeta.valueId + "-"
        });
        products.forEach(p => {
            let pMetaCartString = '';
            p.meta.forEach(pMetaCart => {
                pMetaCartString += pMetaCart.valueId + "-"
            });
            if (p.id === product.id && pMetaString == pMetaCartString) {
                exist = true
            }
        })
        return exist;
    }

    // Update Quantity
    function updateQuantity(product, products, quantity) {
        let pMetaString = '';
        product.meta.forEach(pMeta => {
            pMetaString += pMeta.valueId + "-"
        });

        products.forEach(p => {
            let pMetaCartString = '';
            p.meta.forEach(pMetaCart => {
                pMetaCartString += pMetaCart.valueId + "-"
            });
            if (p.id === product.id && pMetaString == pMetaCartString) {
                p.quantity = parseInt(p.quantity) + parseInt(quantity)
            }
        })

        cart.products = products
        localStorage.setItem('cart', JSON.stringify(cart));

        drawCartItems(products)
        calculateTotalCart(products)
    }

    // Format Price
    function formatPrice(number) {
        let decimals = 2
        let decpoint = '.' // Or Number(0.1).toLocaleString().substring(1, 2)
        let thousand = ',' // Or Number(10000).toLocaleString().substring(2, 3)
        let n = Math.abs(number).toFixed(decimals).split('.')
        n[0] = n[0].split('').reverse().map((c, i, a) =>
            i > 0 && i < a.length && i % 3 == 0 ? c + thousand : c
        ).reverse().join('')
        let final = (Math.sign(number) < 0 ? '-' : '') + n.join(decpoint)
        return final + " " + CURRENCY;
    }

    function metaStringGenerate(p) {
        let pMetaString = '';
        p.meta.forEach(pMeta => {
            pMetaString += pMeta.valueId + "-"
        });
        if (p.meta.length < 1) {
            pMetaString = p.id
        }
        return pMetaString;
    }

    function checkAvansAmount() {
        console.log(cart.products)
        totalAvans = 0;
        cart.products.forEach(product => {
            if (product.avans) {
                totalAvans += product.price_avans * product.quantity
            }
        })

        console.log(totalAvans)

        if (totalAvans > 0 && totalAvans < 100000) {
            Swal.fire({
                icon: 'error',
                title: 'Ukupna vrednost avansnih proizvoda mora biti minimum 100.000,00 din'
            });
            $('.confirm-order').prop('disabled', true)
        } else {
            $('.confirm-order').prop('disabled', false)
        }


    }

    $(document).ready(function() {
        // Accept cookies
        // Check if user has previously accepted cookies
        var cookiesAccepted = getCookie("cookiesAccepted");
        if (!cookiesAccepted) {
            // Show the cookie consent overlay if not accepted
            $("#cookie-container").addClass('show');
        }

        // Handle click on accept button
        $("#accept-cookies").click(function() {
            // Set cookie to record that the user has accepted cookies
            setCookie("cookiesAccepted", true, 365);
            // Hide the cookie consent overlay
            $("#cookie-container").removeClass('show');
        });

        // Function to set cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get cookie value
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        $('#newsletterForm').submit(function(event) {
            console.log('upao')
            event.preventDefault(); // Prevent the default form submission
            var formData = $(this).serialize(); // Serialize form data
            $.ajax({
                type: 'POST',
                url: '/subscribe', // Change this to your backend endpoint
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('.newsletterMsg').html(response.message)
                    setTimeout(function() {
                        $('.newsletterMsg').html('')
                        $('#newsletterEmail').val('')
                    }, 3000)
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    $('.newsletterMsg').html('Email već postoji u bazi!')
                    setTimeout(function() {
                        $('.newsletterMsg').html('')
                        $('#newsletterEmail').val('')
                    }, 3000)
                }
            });
        });

        shippingServiceId = $('.shipping-service:checked').val()
        shippingServicePrice = $('.shipping-service:checked').data('price')
        shippingServiceText = $('.shipping-service:checked').data('text')

        paymentMethodId = $('.payment-method:checked').val()
        paymentMethodText = $('.payment-method:checked').data('text')

        $('.shipping-description').text(shippingServiceText)
        $(".shipping-price").text(formatPrice(shippingServicePrice))

        let avansTime = avansPriceTime()
        if (avansTime) {

        } else {

        }

        if (cart.products.length > 0) {
            drawCartItems(cart.products)
        } else {
            cartContainer.append(cartEmpty)
            cartNumberContainer.append(cartNumberEmpty)
        }

        $(".add-to-cart").on('click', function() {
            itemQuantity = parseInt($('.quantity-input').val())
            if (!itemQuantity) {
                itemQuantity = 1
            }
            localStorage.removeItem('product');
            let product = $(this).data('product')
            if (activePrice == 'price_avans') {
                product.price = product.price_avans
                product.avans = true
            }
            product.quantity = itemQuantity
            product.meta = meta

            if (productExist(product, cart.products)) {
                updateQuantity(product, cart.products, itemQuantity)
            } else {
                cart.products.push(JSON.parse(JSON.stringify(product)))
                localStorage.setItem('cart', JSON.stringify(cart));
                drawCartItems(cart.products)
                calculateTotalCart(cart.products)
            }

            $('.size-item').each(function() {
                $(this).removeClass('active')
            });

            $('.mini_cart,.off_canvars_overlay').addClass('active')

        })

        $('.active-price').on('change', function() {
            activePrice = $(this).val();
        })

        $('.shipping-service').on('change', function() {
            shippingServiceId = $(this).val();
            shippingServicePrice = $(this).data('price')
            shippingServiceText = $(this).data('text')

            $('.shipping-description').text(shippingServiceText)
            $(".shipping-price").text(formatPrice(shippingServicePrice))

            calculateTotalCart(cart.products)
        })

        $('.payment-method').on('change', function() {
            paymentMethodId = $(this).val();
            paymentMethodText = $(this).data('text')
        })


        $(document).on('click', '.remove-from-cart', function() {
            let id = $(this).data('id');
            let metaString = $(this).data('meta')
            if (!metaString) {
                metaString = id
            }
            $('.cart-item-' + id + '-meta-' + metaString).remove();
            $('.cart-page-item-' + id + '-meta-' + metaString).remove();
            productsNew = cart.products.filter(p => (metaStringGenerate(p) !== metaString));
            cart.products = productsNew;
            calculateTotalCart(cart.products)
            calculateSubtotal(cart.products)
            localStorage.setItem('cart', JSON.stringify(cart));
            if (productsNew.length === 0) {
                cartContainer.html("")
                cartContainer.append(cartEmpty)
                cartNumberContainer.html("")
                cartNumberContainer.append(cartNumberEmpty)
                var currentUrl = window.location.href;
                if (currentUrl.includes('zavrsi-kupovinu')) {
                    window.location.href = "/";
                }

            } else {
                let totalProductsNumber = 0;
                productsNew.forEach(p => {
                    totalProductsNumber = totalProductsNumber + parseInt(p.quantity)
                })
                cartNumberContainer.html("")
                cartNumberContainer.html(`<span class="cart_quantity">${totalProductsNumber}</span>`)
            }
        })

    });
</script>
