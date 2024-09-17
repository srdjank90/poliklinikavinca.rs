@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.settings.index') }}">{{ __('Settings') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('backend.settings.payment-methods.index') }}">{{ __('Payment Methods') }}</a></li>
                <li class="breadcrumb-item active" aria-current="settings">{{ $method->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        @include('backend.settings.components.menu')
        <div class="col-12">
            <form method="POST" action="{{ route('backend.settings.payment-methods.update', $method->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" id="name" class="form-control" name="name"
                                value="{{ $method->name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="descrition">{{ __('Description') }}</label>
                            <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{ $method->description }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="icon">{{ __('Icon') }}</label>
                            <input type="text" id="icon" class="form-control" name="icon"
                                value="{{ $method->icon }}">
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="available" {{ $method->available ? 'checked' : '' }}
                                    value="1" type="checkbox" id="availablePaymentMethod">
                                <label class="form-check-label" for="availablePaymentMethod">
                                    {{ __('Payment method is available') }}
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary float-end" type="submit">{{ __('Update') }}</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
