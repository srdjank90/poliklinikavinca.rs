<script src="/themes/modern-2023/assets/js/jquery.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/themes/modern-2023/assets/vendors/clipboard/clipboard.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/vanilla-lazyload/lazyload.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/waypoints/jquery.waypoints.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/lightgallery/lightgallery.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/lightgallery/plugins/zoom/lg-zoom.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/lightgallery/plugins/video/lg-video.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/isotope/isotope.pkgd.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/slick/slick.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/gsap/gsap.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/gsap/ScrollToPlugin.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/gsap/ScrollTrigger.min.js"></script>
<script src="/themes/modern-2023/assets/vendors/mapbox-gl/mapbox-gl.js"></script>
<script src="/themes/modern-2023/assets/js/theme.min.js"></script>

<!-- Chart Scripts -->
<script>
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
    let cartNumberEmpty =
        ' <a class="position-relative lh-1 color-inherit text-decoration-none cart-open-button" href="#"' +
        'data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart"' +
        'aria-expanded="false">' +
        '<svg class="icon icon-star-light">' +
        '<use xlink:href="#icon-shopping-bag-open-light"></use>' +
        '</svg>' +
        '</a>';

    let cartEmpty = '<div class="offcanvas-header fs-4">' +
        '<h4 class="offcanvas-title fw-semibold">{{ __('Shoping Cart') }}</h4>' +
        '<button type="button" class="btn-close btn-close-bg-none" data-bs-dismiss="offcanvas" aria-label="Close">' +
        '<i class="far fa-times"></i>' +
        '</button>' +
        '</div>' +
        '<div class="offcanvas-body me-xl-auto pt-0 mb-2 mb-xl-0">' +
        '<div class="text-center">' +
        '<div class="mb-5">' +
        '<h3>{{ __('Your cart is currently empty') }}</h3>' +
        '<p>{{ __('Before proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our "Products" page.') }}</p>' +
        '</div>' +
        '<a class="btn btn-dark border-0 px-6" href="{{ route('frontend.products') }}">{{ __('Start shopping') }}</a>' +
        '</div>'
    '</div>';

    function changeMetaValue(type, value, valueId) {
        meta.forEach(m => {
            if (type == m.name) {
                m.value = value
                m.valueId = valueId
            }
        });
    }

    // Draw Items in Cart
    function drawCartItems(products) {
        let productsHTML = ''
        let totalCart = 0
        products.forEach(product => {

            let productImage = '';
            if (product.files.length > 0) {
                productImage = '<img width="60" height="80" src="' + APP_STORAGE_URL + product.files[0].path +
                    '" alt="">';
            }

            let pMetaString = '';
            product.meta.forEach(pMeta => {
                pMetaString += pMeta.valueId + "-"
            });

            totalCart += product.price;

            productsHTML += '<tr class="position-relative cart-item-' + product.id + '-meta-' + pMetaString +
                '">' +
                '<td class="align-middle text-center">' +
                '<a href="#" data-id="' + product.id + '"  data-meta="' + pMetaString +
                '" class="d-block clear-product remove-from-cart">' +
                '<i class="far fa-times"></i>' +
                '</a>' +
                '</td>' +
                '<td class="shop-product">' +
                '<div class="d-flex align-items-center">' +
                '<div class="me-6">' +
                productImage +
                '</div>' +
                '<div class>' +
                '<p class="card-text mb-1">' +
                '<span class="fs-13px fw-500 text-decoration-line-through pe-3">' + formatPrice(product
                    .price_old) + '</span>' +
                '<span class="fs-15px fw-bold text-body-emphasis">' + formatPrice(product.price) + '</span>' +
                '</p>' +
                '<p class="fw-500 text-body-emphasis mb-0">' + product.name + ' x ' + product.quantity + '</p>';
            product.meta.forEach(m => {
                productsHTML += '<small class="m-0"> ' + m.name + ': ' + m.value + '</small>';
            });
            productsHTML += '</div>' +
                '</div>' +
                '</td>' +
                '</tr>';
        });


        let fullCartHTML = '<div class="offcanvas-header fs-4">' +
            '<h4 class="offcanvas-title fw-semibold">Korpa</h4>' +
            '<button type="button" class="btn-close btn-close-bg-none" data-bs-dismiss="offcanvas" aria-label="Close">' +
            '<i class="far fa-times"></i>' +
            '</button>' +
            '</div>' +
            '<div class="offcanvas-body me-xl-auto pt-0 mb-2 mb-xl-0">' +
            '<form class="table-responsive-md shopping-cart pb-8 pb-lg-10">' +
            '<table class="table table-borderless">' +
            '<tbody>' +
            productsHTML +
            '</tbody>' +
            '</table>' +
            '</form>' +
            '</div>' +
            '<div class="offcanvas-footer flex-wrap">' +
            '<div class="d-flex align-items-center justify-content-between w-100 mb-5">' +
            '<span class="text-body-emphasis">{{ __('Total') }}:</span>' +
            '<span class="cart-total fw-bold text-body-emphasis total-cart"></span>' +
            '</div>' +
            '<a href="{{ route('frontend.checkout') }}" class="btn btn-dark w-100 mb-7" title="Check Out">{{ __('Checkout') }}</a>' +
            '</div>';

        cartContainer.html("");
        cartContainer.html(fullCartHTML);

        let totalProductsNumber = 0;
        products.forEach(p => {
            totalProductsNumber = totalProductsNumber + p.quantity
        })

        cartNumberContainer.html("");
        cartNumberContainer.html(
            '<a class="position-relative lh-1 color-inherit text-decoration-none cart-open-button" href="#"' +
            'data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart"' +
            'aria-expanded="false">' +
            '<svg class="icon icon-star-light">' +
            '<use xlink:href="#icon-shopping-bag-open-light"></use>' +
            '</svg>' +
            '<span ' +
            'class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square"' +
            'style="--square-size: 18px">' + totalProductsNumber + '</span>' +
            '</a>');
        $('.total-cart').html(formatPrice(totalCart))
    }

    // Calculate Total Price of Products in Cart
    function calculateTotalCart(products) {
        $('.total-cart').html('')
        totalCart = 0;
        products.forEach(product => {
            totalCart += product.price * product.quantity;
        })
        $('.total-cart').html(formatPrice(totalCart))
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
                p.quantity = p.quantity + quantity
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
        return pMetaString;
    }

    $(document).ready(function() {

        var offcanvasCart = document.getElementById('shoppingCart')

        if (cart.products.length > 0) {
            drawCartItems(cart.products)
        } else {
            cartContainer.append(cartEmpty)
            cartNumberContainer.append(cartNumberEmpty)
        }

        $(".add-to-cart").on('click', function() {
            if ($('#itemForm')[0].checkValidity()) {
                itemQuantity = parseInt($('.quantity-input').val())
                localStorage.removeItem('product');
                let product = $(this).data('product')
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

                var bsOffcanvas = new bootstrap.Offcanvas(offcanvasCart)
                bsOffcanvas.show()
            } else {
                alert('Morate izabrati sve opcije!');
            }

        })

        $(document).on('click', '.remove-from-cart', function() {
            let id = $(this).data('id');
            let metaString = $(this).data('meta')
            $('.cart-item-' + id + '-meta-' + metaString).remove();
            $('.checkout-item-' + id + '-meta-' + metaString).remove();
            productsNew = cart.products.filter(p => (metaStringGenerate(p) !== metaString));
            cart.products = productsNew;
            calculateTotalCart(productsNew)
            localStorage.setItem('cart', JSON.stringify(cart));
            if (productsNew.length === 0) {
                cartContainer.html("")
                cartContainer.append(cartEmpty)
                cartNumberContainer.html("")
                cartNumberContainer.append(cartNumberEmpty)
            } else {
                let totalProductsNumber = 0;
                productsNew.forEach(p => {
                    totalProductsNumber = totalProductsNumber + p.quantity
                })
                cartNumberContainer.html("")
                cartNumberContainer.html(
                    '<i class="bi-basket"></i> <span style="position:absolute;top:0;right: 5px;">' +
                    totalProductsNumber + '</span>');
            }
        })

    });
</script>
