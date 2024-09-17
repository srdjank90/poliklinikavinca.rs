@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.settings.index') }}">{{ __('Settings') }}</a></li>
                <li class="breadcrumb-item active" aria-current="settings">{{ __('Payment Methods') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        @include('backend.settings.components.menu')
        @foreach ($paymentMethods as $method)
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="left">
                            @if ($method->icon != '')
                                <i class="bi {{ $method->icon }} bg-primary rounded p-1 text-white"></i>
                            @endif
                            {{ $method->name }}
                            @if ($method->available)
                                <span class="badge border text-success">{{ __('Available') }}</span>
                            @else
                                <span class="badge border text-danger">{{ __('Not Available') }}</span>
                            @endif
                        </div>
                        <div class="right">
                            <a class="btn btn-primary btn-sm rounded-circle"
                                href="{{ route('backend.settings.payment-methods.edit', $method->id) }}">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button role="button" data-model="settings/payment-methods" data-id="{{ $method->id }}"
                                class="btn btn-danger btn-sm rounded-circle item-delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-6 mb-2  ">
            <a class="btn btn-primary w-100 h-100 d-flex justify-content-center align-items-center"
                href="{{ route('backend.settings.payment-methods.create') }}"><i class="bi bi-patch-plus-fill me-2"></i>
                {{ __('Add') }}</a>
        </div>

    </div>
@endsection
