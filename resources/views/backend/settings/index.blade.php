@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="settings">{{ __('Settings') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        @include('backend.settings.components.menu')

        <div class="col-md-12">
            <form class="panel-body" action="/backend/options/store" method="POST">
                @csrf
                @method('post')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="settingTitle">{{ __('Shop Store') }}</label>
                            <input type="text" class="form-control"
                                value="{{ isset($options['setting_title_opt']) ? $options['setting_title_opt'] : '' }}"
                                name="setting_title_opt" id="settingTitle">
                        </div>
                        <div class="form-group mb-2">
                            <label for="settingEmail">{{ __('Email') }}</label>
                            <input type="email" class="form-control"
                                value="{{ isset($options['setting_email_opt']) ? $options['setting_email_opt'] : '' }}"
                                name="setting_email_opt" id="settingEmail">
                        </div>
                        <div class="form-group mb-2">
                            <label for="settingPhone">{{ __('Phone') }}</label>
                            <input type="text" class="form-control"
                                value="{{ isset($options['setting_phone_opt']) ? $options['setting_phone_opt'] : '' }}"
                                name="setting_phone_opt" id="settingPhone">
                        </div>
                        <div class="form-group mb-2">
                            <label for="settingAddress">{{ __('Address') }}</label>
                            <input type="text" class="form-control"
                                value="{{ isset($options['setting_address_opt']) ? $options['setting_address_opt'] : '' }}"
                                name="setting_address_opt" id="settingAddress">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 text-end">
                        <button class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
