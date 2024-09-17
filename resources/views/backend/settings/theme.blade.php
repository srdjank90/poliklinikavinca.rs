@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.settings.index') }}">{{ __('Settings') }}</a></li>
                <li class="breadcrumb-item active" aria-current="settings">{{ __('Theme') }}</li>
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
                            <label for="">{{ __('Active Theme') }}</label>
                            <select class="form-select" name="theme_active_opt">
                                @foreach ($themes as $theme)
                                    <option
                                        {{ isset($options['theme_active_opt']) && $options['theme_active_opt'] == $theme ? 'selected' : '' }}
                                        value="{{ $theme }}">{{ $theme }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary float-end">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
