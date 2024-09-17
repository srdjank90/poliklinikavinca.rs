@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.orders.index') }}">{{ __('Orders') }}</a></li>
                <li class="breadcrumb-item active" aria-current="orders">{{ __('Edit') }}</li>
            </ol>
        </nav>
    </div>
    <form action="">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-xs-12">
                <!-- Customer information -->
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="p-0 m-0">{{ __('Customer information') }}</h5>
                            <a href="javascript:void(0)"></a>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="firstName">{{ __('First name') }}</label>
                                    <input type="text" name="first_name" id="firstName" readonly
                                        value="{{ $order->first_name }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="lastName">{{ __('Last name') }}</label>
                                    <input type="text" name="last_name" id="firstName" readonly
                                        value="{{ $order->last_name }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" readonly
                                        value="{{ $order->email }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="phone" readonly
                                        value="{{ $order->phone }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="jmbg">{{ __('JMBG') }}</label>
                                    <input type="text" name="jmbg" id="jmbg" readonly
                                        value="{{ $order->jmbg }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="p-0 m-0">{{ __('Customer address') }}</h5>
                            <a href="javascript:void(0)"></a>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="city">{{ __('City') }}</label>
                                    <input type="text" name="city" id="city" readonly
                                        value="{{ $order->city }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="zip">{{ __('Zip') }}</label>
                                    <input type="text" name="zip" id="zip" readonly
                                        value="{{ $order->zip }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="address" readonly
                                        value="{{ $order->address }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ __('Customer note') }}</label>
                                    <textarea name="note" class="form-control" id="note" rows="2">{{ $order->note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products information -->
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="p-0 m-0">{{ __('Products information') }}</h5>
                            <a href="javascript:void(0)"></a>
                        </div>
                        <div class="products">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Avans Price') }}</th>
                                        <th class="text-end">{{ __('Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderProducts as $product)
                                        <tr>
                                            <td>{{ $product->id }} </td>
                                            <td><a
                                                    href="{{ route('backend.products.edit', $product->product->id) }}">{{ $product->product->name }}</a>
                                            </td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-center">
                                                @if ($product->avans_price == 1)
                                                    {{ __('Yes') }}
                                                @else
                                                    {{ __('No') }}
                                                @endif
                                            </td>
                                            <td class="text-end"> @if ($product->quantity > 1)
                                                {{ $product->quantity }} x
                                                @endif  @priceFormat($product->product->price) {{ $currency }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('Subtotal') }}</td>
                                        <td class="text-end">{{ $order->subtotalFormated() }} {{ $currency }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('Shipping') }}</td>
                                        <td class="text-end">{{ $order->shippingPriceFormated() }} {{ $currency }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ __('PDV') }}</td>
                                        <td class="text-end">{{ $order->pdvPriceFormated() }} {{ $currency }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
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
            <div class="col-xl-4 col-lg-4 col-md-12 col-xs-12">

                <!-- Shipping -->
                <div class="card mb-2 ">
                    <div class="card-body">
                        <div>
                            <h5>{{ __('Shipping') }}</h5>
                            <div class="order-created-date d-flex justify-content-between mb-2">
                                <span class="fw-bold">{{ __('Type') }}</span>
                                {{ $order->shipp->name }}
                            </div>
                            <div class="order-updated-date d-flex justify-content-between mb-2">
                                <span class="fw-bold">{{ __('Price') }}</span>
                                @priceFormat($order->shipping / 0.8)  {{ $currency }}
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Payment method -->
                <div class="card mb-2 ">
                    <div class="card-body">
                        <div>
                            <h5>{{ __('Payment Method') }}</h5>
                            <div class="order-created-date d-flex justify-content-between mb-2">
                                <span class="fw-bold">{{ __('Method') }}</span>
                                {{ $order->pmethod->name }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order status -->
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <div class="order-created-date d-flex justify-content-between mb-2">
                                    <span class="fw-bold">{{ __('Created') }}</span>
                                    {{ $order->createDateFormated(true) }}
                                </div>
                                <div class="order-updated-date d-flex justify-content-between mb-2">
                                    <span class="fw-bold">{{ __('Updated') }}</span>
                                    {{ $order->updateDateFormated(true) }}
                                </div>
                                <div class="form-group">
                                    <span class="text-center align-middle order-status edit-order-status" role="button"
                                        data-id="{{ $order->id }}" data-shipping-no="{{ $order->shipping_number }}"
                                        data-status="{{ $order->status }}" data-bs-toggle="modal"
                                        data-bs-target="#changeStatusModal">{!! $order->statusLabel() !!} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 d-flex justify-content-end align-items-center d-none">
                    <button class="btn btn-primary text-white"> <i class="fa fa-save"></i>
                        {{ __('Update order') }}</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Change status Modal -->
    <div class="modal fade" id="changeStatusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="changeStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusModalLabel">{{ __('Change status') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="hidden" id="orderId">
                        <div class="form-group mb-3">
                            <select name="status" class="form-select" id="status">
                                <option value="pending">{{ __('Pending') }}</option>
                                <option value="shipping">{{ __('Shipping') }}</option>
                                <option value="completed">{{ __('Completed') }}</option>
                                <option value="canceled">{{ __('Canceled') }}</option>
                            </select>
                        </div>
                        <div class="shipping-number-container d-none">
                            <div class="form-group mb-2">
                                <label for="shippingNumber">#{{ __('Shipping number') }}</label>
                                <input type="text" class="form-control d-none1" name="shipping_number"
                                    id="shippingNumber" placeholder="{{ __('Enter shipping number') }}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="button" class="btn btn-primary change-modal"
                        data-bs-dismiss="modal">{{ __('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Update order Status
        function updateOrderStatus(orderId, status, shippingNo) {
            $.ajax({
                url: "/backend/orders/update-status/" + orderId,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": status,
                    "shipping_number": shippingNo
                },
                success: function(response) {
                    window.location.reload()
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'There is an error getting order info!'
                    });
                },
            });
        }
        $(document).ready(function() {
            $(document).on("click", '.order-status', function() {
                let orderId = $(this).data('id');
                $("#orderId").val(orderId)
                let orderStatus = $(this).data('status')
                let orderShippingNo = $(this).data('shipping-no')
                $("#shippingNumber").val(orderShippingNo)
                $('#status').val(orderStatus)
            });

            $('#status').on('change', function() {
                let chosenStatus = $(this).val()
                if (chosenStatus === 'shipping') {
                    $(".shipping-number-container").removeClass('d-none')
                } else {
                    $(".shipping-number-container").addClass('d-none')
                }
            })

            // Change product status
            $(document).on("click", '.change-modal', function() {
                let orderId = $("#orderId").val()
                let status = $("#status").val()
                let shippingNo = $("#shippingNumber").val()
                updateOrderStatus(orderId, status, shippingNo)
            })
        });
    </script>
@endsection
