@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.packages.index') }}">{{ __('Packages') }}</a></li>
                <li class="breadcrumb-item active" aria-current="packages">{{ __('Settings') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                <div class="left-page-actions">
                    <a class="btn btn-primary" href="{{ route('backend.packages.index') }}"><i
                            class="bi bi-arrow-left-circle"></i> {{ __('Back') }}</a>
                </div>
                <div class="right-page-actions">

                </div>
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <form class="panel-body" action="/backend/options/store" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <h4>Packages Settings</h4>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">{{ __('Packages Per Page') }}</label>
                            <input type="number" class="form-control"
                                value="{{ isset($options['package_per_page_opt']) ? $options['package_per_page_opt'] : '' }}"
                                name="package_per_page_opt" min="1" id="productPerPageOpt">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Packages select options') }}</label>
                            <textarea class="form-control" name="package_select_range_opt" id="productSelectOptionsOpt">
                                {{ isset($options['package_select_range_opt']) ? $options['package_select_range_opt'] : '' }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <script></script>
@endsection
