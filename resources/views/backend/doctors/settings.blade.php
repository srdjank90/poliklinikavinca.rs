@extends('backend.layout.backend')

@section('content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.doctors.index') }}">{{ __('Doctors') }}</a></li>
                <li class="breadcrumb-item active" aria-current="doctors">{{ __('Settings') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="col-md-12 mb-3 d-flex justify-content-between align-items-center">
                <div class="left-page-actions">
                    <a class="btn btn-primary" href="{{ route('backend.doctors.index') }}"><i
                            class="bi bi-arrow-left-circle"></i> {{ __('Back') }}</a>
                </div>
                <div class="right-page-actions">

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" action="/backend/options/store" method="POST">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">{{ __('Doctors Per Page') }}</label>
                            <input type="number" class="form-control"
                                value="{{ isset($options['doctor_per_page_opt']) ? $options['doctor_per_page_opt'] : '' }}"
                                name="doctor_per_page_opt" min="1" id="doctorPerPageOpt">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
