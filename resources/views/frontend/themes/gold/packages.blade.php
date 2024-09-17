@extends('frontend.themes.gold.layout.layout')
@section('title', '')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Investicioni kalkulator</h1>
                <p class="text-center">
                    Investicioni kalkulator za zlato je korisni alat koji vam omogućava da analizirate različite scenarije i
                    pakete ulaganja, kako biste optimizovali svoje investicije u zlato.
                </p>
            </div>
            <div class="col-12 col-md-3">

            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('frontend.packages') }}" method="GET" class="investment-calculator-form">
                    @csrf
                    <select class="w-md-50 w-sm-100 mb-3 me-2" name="investment_price" id="investmentPrice">
                        <option {{ $investmentPrice == '' ? 'selected' : '' }} value="">Izaberi iznos</option>
                        @foreach ($packagePriceOptionsArray as $po)
                            <option {{ $investmentPrice == $po ? 'selected' : '' }} value="{{ $po }}">
                                {{ $po }} dinara</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-theme-light w-md-50 w-sm-100">Pogledaj investicione
                        pakete</button>
                </form>
            </div>
            <div class="col-12 col-md-3">

            </div>
        </div>
    </div>

    <div class="services_gallery py-5">
        <div class="container">
            @if (count($packages) > 0)
                @if ($investmentPrice != '')
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-12 mb-3">
                                <div class="package-item card p-3">
                                    <!-- Package item heading -->
                                    <div class="package-item-heading">
                                        <div class="image-wrapper">
                                            <img class="p-4" src="/themes/gold/assets/img/percentage.svg" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h3>{{ $package->name }}</h3>
                                            {!! $package->description !!}
                                        </div>
                                    </div>

                                    <!-- Package item products -->
                                    <div class="row package-products-wrapper">
                                        @foreach ($package->products as $product)
                                            <div class="col-12 mb-2">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-6">
                                                        <div class="product-details">
                                                            <img src="{{ $storageUrl }}{{ $product->files[0]->path }}"
                                                                alt="" class="product-image">
                                                            <span class="fw-bold">{{ $product->name }}</span>
                                                            <div class="product-price d-md-none">
                                                                <b>@priceFormat($product->price) </b> <span class="ms-1">
                                                                    {{ $currency }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="d-none d-md-flex product-price">
                                                            <b>@priceFormat($product->price) </b> <span class="ms-1">
                                                                {{ $currency }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12 mb-2">
                                            <div class="row mb-3">
                                                <div class="col-12 col-md-6">

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <p class="fs-4">Cena proizvoda: <b>@priceFormat($package->price_dynamic)</b>
                                                            {{ $currency }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12 col-md-6">

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <p class="fs-4">Ušteda: <b>@priceFormat($package->price_dynamic - $package->price)</b>
                                                            {{ $currency }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6">

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <p class="fs-4">Cena paketa: <b>@priceFormat($package->price)</b>
                                                            {{ $currency }}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <button class="btn btn-theme-dark mt-3 package-buy-button fs-5"
                                                            data-bs-toggle="modal" data-bs-target="#packageBuyModal"
                                                            data-price="{{ $package->price }} {{ $currency }}"
                                                            data-id="{{ $package->id }}"
                                                            data-name="{{ $package->name }}">
                                                            Kupite investicioni paket
                                                        </button>
                                                    </div>
                                                    <!-- Button trigger modal -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Nažalost, nemamo paket koji odgovara iznosu koji ste odabrali za
                            investiciju.</h3>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="packageBuyModal" tabindex="-1" aria-labelledby="packageBuyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageBuyLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="hidden" name="package_id" id="packageId">
                        <div class="froug-group mb-2">
                            <label for="packageName">Naziv</label>
                            <input type="text" id="packageName" name="package_name" readonly class="form-control">
                        </div>
                        <div class="froug-group mb-2">
                            <label for="packagePrice">Cena</label>
                            <input type="text" id="packagePrice" name="package_price" readonly class="form-control">
                        </div>
                        <div class="froug-group mb-2">
                            <label for="email">Email <small>(obavezno)</small></label>
                            <input type="text" id="email" required name="email" class="form-control">
                        </div>
                        <div class="froug-group mb-2">
                            <label for="phone">Telefon <small>(obavezno)</small></label>
                            <input type="text" id="phone" required name="phone" class="form-control">
                        </div>
                        <div>
                            <small>Nakon provere, kontaktiraćemo vas u najkraćem mogućem roku</small>
                        </div>
                    </form>
                    <div class="messages">
                        <div class="success text-center text-success d-none">
                            Uspešno ste poslali zahtev za kupovinu investicionog paketa. Kontaktiraćemo vas uskoro
                        </div>
                        <div class="error text-center text-danger d-none">
                            Došlo je do problema. Molimo vas, pokušajte kasnije ili nas kontaktirajte
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                    <button type="button" class="btn btn-primary buy-package-confrim"><i
                            class="fas fa-spinner fa-spin loader d-none"></i>
                        Poruci</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.package-buy-button').on('click', function() {
                // Retrieve data from data attributes
                var packageId = $(this).data('id');
                var packageName = $(this).data('name');
                var packagePrice = $(this).data('price');

                // Assign data to input elements
                $('#packageId').val(packageId);
                $('#packageName').val(packageName);
                $('#packagePrice').val(packagePrice);

            });

            $('.buy-package-confrim').on('click', function() {
                $('.loader').removeClass('d-none')
                var packageId = $('#packageId').val();
                var packageName = $('#packageName').val();
                var packagePrice = $('#packagePrice').val();
                var email = $('#email').val()
                var phone = $('#phone').val()

                $.ajax({
                    url: '/paketi-porudzbina', // Laravel route
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include CSRF token
                        packageId: packageId,
                        packageName: packageName,
                        packagePrice: packagePrice,
                        phone: phone,
                        email: email
                    },
                    success: function(response) {
                        $('.success').removeClass('d-none')
                        setTimeout(() => {
                            $('#packageBuyModal').modal('hide')
                        }, 5000);
                    },
                    error: function(xhr, status, error) {
                        $('.success').removeClass('d-none')
                        console.log('An error occurred: ' + xhr
                            .responseText); // Show error message
                        setTimeout(() => {
                            $('#packageBuyModal').modal('hide')
                        }, 5000);
                    }
                });
            });
        });
    </script>
@endsection
