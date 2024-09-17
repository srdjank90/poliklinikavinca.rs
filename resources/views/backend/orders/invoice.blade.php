@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.orders.index') }}">{{ __('Orders') }}</a></li>
                <li class="breadcrumb-item active" aria-current="orders">{{ __('Invoice') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Invoice information -->
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="p-0 m-0">{{ __('Invoice information') }}</h5>
                        <a href="javascript:void(0)"></a>
                    </div>
                    <div class="invoice" id="invoice">
                        <div class="information row">
                            <div class="col-6 mb-3">
                                <p class="p-0 m-0">{{ $order->first_name }} {{ $order->last_name }}</p>
                                <p class="p-0 m-0">{{ $order->address }}</p>
                                <p class="p-0 m-0">{{ $order->city }}, {{ $order->zip }}</p>
                                <p class="p-0 m-0">{{ $order->phone }}</p>
                                <p class="p-0 m-0">{{ $order->email }}</p>
                            </div>
                            <div class="col-6 mb-3 text-end">
                                <p class="p-0 m-0 fs-4"></p>
                                <p class="p-0 m-0">#{{ __('Invoice') }}: {{ $order->oid }}</p>
                                <p class="p-0 m-0">{{ __('Date') }}:{{ $order->createDateFormated() }}</p>
                            </div>
                        </div>
                        <div class="products">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th width="100">{{ __('Quantity') }}</th>
                                        <th class="text-end">{{ __('Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderProducts as $product)
                                        <tr>
                                            <td>{{ $product->id }} </td>
                                            <td>
                                                <a href="{{ route('backend.products.edit', $product->product->id) }}">{{ $product->product->name }}</a>
                                                ({{ $product->product_size }})
                                            </td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-end">
                                                @if ($product->quantity > 1)
                                                    {{ $product->quantity }} x
                                                @endif
                                                {{ $product->singlePriceFormated() }} {{ $currency }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('Subtotal') }}</td>
                                        <td class="text-end">{{ $order->subtotalFormated() }} {{ $currency }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('Shipping') }}</td>
                                        <td class="text-end">{{ $order->shippingPriceFormated() }} {{ $currency }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('PDV') }}</td>
                                        <td class="text-end">{{ $order->pdvPriceFormated() }} {{ $currency }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('Total') }} </td>
                                        <td class="text-end fw-bold fs-5">💰 {{ $order->totalFormated() }}
                                            {{ $currency }}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 d-flex justify-content-end align-items-center">
            <button onclick="sendInvoice()" class="btn btn-success me-2 d-none"> <i class="bi bi-envelope-at"></i>
                {{ __('Send Invoice') }}</button>
            <a href="{{ route('backend.orders.invoice.download', $order->id) }}" class="btn btn-secondary"> <i
                    class="bi bi-cloud-arrow-down"></i> {{ __('Download
                                Invoice') }} </a>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function printInvoice() {
            const printContents = document.getElementById('invoicePrintable').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function sendInvoice() {
            let orderId = "{{ $order->id }}";
            //orders.invoice.confirmation.email
            console.log('send invoice');
            $.ajax({
                url: APP_URL + "/backend/orders/" + orderId + "/invoice-confirmation-email",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(response) {
                    console.log(response)
                    toastMixin.fire({
                        icon: 'success',
                        animation: true,
                        title: 'Email successfully sent to ' + response.order.email
                    });
                },
                error: function(response) {
                    var errors = response.responseJSON;
                    toastMixin.fire({
                        icon: 'error',
                        animation: true,
                        title: errors.error
                    });
                },
            });
        }

        $(document).ready(function() {

        });
    </script>
@endsection
