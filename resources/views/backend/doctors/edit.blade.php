@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.doctors.index') }}">{{ __('Doctors') }}</a></li>
                <li class="breadcrumb-item active" aria-current="doctors">{{ __('Edit Doctor') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.doctors.index') }}"><i
                        class="bi bi-arrow-left-circle"></i>
                    {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">
                <button type="button" data-id="{{ $doctor->id }}" data-model="Doctor"
                    class="btn btn-secondary show-seo-modal">
                    <i class="bi bi-google"></i> {{ __('SEO') }}
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" enctype="multipart/form-data" action="/backend/doctors/update/{{ $doctor->id }}"
                method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <!-- Doctor Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Doctor Name') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about doctor Name and doctor Slug') }}</small>
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $doctor->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ $doctor->slug }}">
                                </div>
                            </div>
                        </div>

                        <!-- Doctor Content -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Doctor Content') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Content of a doctor that will be shown on a frontent') }}</small>
                                <div class="form-group mb-3">
                                    <label for="area">{{ __('Area') }}</label>
                                    <input type="text" name="area" id="area" class="form-control"
                                        value="{{ $doctor->area }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $doctor->email }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $doctor->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="content">{{ __('Content') }}</label>
                                    <textarea class="form-control tinymce" name="content" id="content" cols="30" rows="10">{{ $doctor->content }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- Doctor Statistic -->
                        <div class="card mb-3 d-none">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>{{ __('Visits') }}</b>
                                    <span><i class="bi bi-binoculars text-info"></i> 0</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>{{ __('SEO') }}</b>
                                    <span><i class="bi bi-search-heart text-success"></i> 100%</span>
                                </div>
                            </div>
                        </div>
                        <!-- Doctor Status -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Created:</b>
                                    <span>{{ $doctor->created_at }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Updated:</b>
                                    <span>{{ $doctor->updated_at }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center actions my-3">
                            <button role="button" class="btn btn-danger"> <i class="bi bi-trash"></i>
                                {{ __('Delete') }}</button>
                            <button role="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i>
                                {{ __('Update') }}</button>
                        </div>

                        <!-- Doctor Image -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="doctorImage" class="w-100">{{ __('Image') }}</label>
                                    @if ($doctor->image)
                                        <img width="150" src="{{ $storageUrl }}{{ $doctor->image->path }}"
                                            alt="">
                                    @endif
                                    <input class="form-control form-control-sm" name="doctor_image" id="doctorImage"
                                        type="file">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
