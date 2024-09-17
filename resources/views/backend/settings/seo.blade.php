@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.settings.index') }}">{{ __('Settings') }}</a></li>
                <li class="breadcrumb-item active" aria-current="settings">{{ __('Seo') }}</li>
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
                            <label for="settingSeoTitle">{{ __('Title') }}</label>
                            <input type="text" class="form-control"
                                value="{{ isset($options['setting_seo_title_opt']) ? $options['setting_seo_title_opt'] : '' }}"
                                name="setting_seo_title_opt" id="settingSeoTitle">
                        </div>
                        <div class="form-group mb-2">
                            <label for="settingSeoDescription">{{ __('Description') }}</label>
                            <textarea class="form-control" name="setting_seo_description_opt" id="settingSeoDescription" cols="5"
                                rows="3">{{ isset($options['setting_seo_description_opt']) ? $options['setting_seo_description_opt'] : '' }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="settingSeoKeywords">{{ __('Keywords') }}</label>
                            <textarea class="form-control" name="setting_seo_keywords_opt" id="settingSeoKeywords" cols="5" rows="3">{{ isset($options['setting_seo_keywords_opt']) ? $options['setting_seo_keywords_opt'] : '' }}</textarea>
                        </div>
                        <button class="btn btn-primary float-end">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
