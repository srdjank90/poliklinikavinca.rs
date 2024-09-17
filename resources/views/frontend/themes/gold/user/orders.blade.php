@extends('frontend.themes.gold.layout.layout')

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Moj nalog</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li>Porudžbine</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumb Section -->

    <!-- My Account -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        @include('frontend.themes.gold.user.components.menu')
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <i class="bi bi-info-circle"></i> {{ session('message') }}
                            </div>
                        @endif

                        <!-- Password Change -->
                        <div class="profile-section-wrapper">
                            <h4 class="mb-4">Porudžbine</h4>
                            @if (count($orders) > 0)
                                <table class="table table-hover d-none d-md-block">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="50">#</th>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __('Products') }}</th>
                                            <th width="120" class="text-center">{{ __('Total') }}</th>
                                            <th width="95" class="text-center">{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <!-- Number -->
                                                <th class="text-center align-middle" scope="row">
                                                    <span>{{ $order->oid }}</span>
                                                </th>
                                                <!-- Address -->
                                                <td class="align-middle">
                                                    <div class="order-address-column">
                                                        <div class="address">
                                                            <i class="bi bi-mailbox2 text-primary"></i>
                                                            {{ $order->address }}
                                                        </div>
                                                        <div class="city">
                                                            <i class="bi bi-house-check-fill text-primary"></i>
                                                            {{ $order->zip }}
                                                            {{ $order->city }}
                                                        </div>
                                                        <div class="city">
                                                            <i class="bi bi-globe-europe-africa text-primary"></i>
                                                            {{ $order->country }}
                                                        </div>

                                                    </div>
                                                </td>
                                                <!-- Products -->
                                                <td class="align-middle">
                                                    <div class="order-products-column">
                                                        @foreach ($order->orderProducts as $oProduct)
                                                            <div>
                                                                <a class="me-2" target="_blank"
                                                                    href="{{ route('frontend.product', $oProduct->product->slug) }}">{{ $oProduct->product->name }}
                                                                </a>
                                                                x <b> {{ $oProduct->quantity }} </b>
                                                                <div>
                                                                    @if ($oProduct->meta_data)
                                                                        @foreach (json_decode($oProduct->meta_data) as $key => $meta)
                                                                            <b>{{ $meta->name }}:</b>
                                                                            @if (@$meta->value)
                                                                                {{ $meta->value }},
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <!-- Total -->
                                                <td class="text-center align-middle">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Subtotal: {{ $order->subtotalFormated() }}">
                                                        {{ $order->totalFormated() }} {{ $currency }}
                                                    </span>
                                                </td>
                                                <!-- Status -->
                                                <td class="text-center align-middle">
                                                    {{ $order->status }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row d-md-none pb-2" style="border-bottom: 1px solid gray">
                                    @foreach ($orders as $key => $order)
                                        <div class="col-12">
                                            {{ $order->oid }}
                                        </div>
                                        <div class="col-12">
                                            <b>Adresa:</b> <br> {{ $order->address }},{{ $order->city }},
                                            {{ $order->zip }},
                                            {{ $order->country }}
                                        </div>
                                        <div class="col-12">
                                            <b>Proizvodi:</b> <br>
                                            @foreach ($order->orderProducts as $oProduct)
                                                <div>
                                                    <a class="me-2" target="_blank"
                                                        href="{{ route('frontend.product', $oProduct->product->slug) }}">{{ $oProduct->product->name }}
                                                    </a>
                                                    x <b> {{ $oProduct->quantity }} </b>
                                                    <div>
                                                        @if ($oProduct->meta_data)
                                                            @foreach (json_decode($oProduct->meta_data) as $key => $meta)
                                                                <b>{{ $meta->name }}:</b>
                                                                @if (@$meta->value)
                                                                    {{ $meta->value }},
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12">
                                            Ukupno: <br>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Subtotal: {{ $order->subtotalFormated() }}">
                                                {{ $order->totalFormated() }} {{ $currency }}
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            {{ $order->status }}
                                        </div>
                                    @endforeach
                                </div>
                                {{ $orders->links() }}
                            @else
                                <div class="sk-table-empty">
                                    Još uvek nemate porudžbina
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #My Account -->
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#profileInfoDataSubmit').on('click', function() {
                $('#profileInfoForm').submit();
            })
        })
    </script>
@endsection
