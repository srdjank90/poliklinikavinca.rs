@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.services.index') }}">{{ __('Services') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('backend.services.edit', $service->id) }}">{{ $service->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="faq">{{ $serviceFaq->name }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.services.faqs.index', $service->id) }}"><i
                        class="bi bi-arrow-left-circle"></i>
                    {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">

            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" enctype="multipart/form-data"
                action="/backend/services/{{ $service->id }}/faqs/update/{{ $serviceFaq->id }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <!-- Service Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Service Question') }}</h6>
                                <div class="form-group">
                                    <label for="question">{{ __('Question') }}</label>
                                    <input type="text" name="question" id="question" class="form-control"
                                        value="{{ $serviceFaq->question }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="answer">{{ __('Answer') }}</label>
                                    <textarea name="answer" id="answer" class="form-control" cols="5" rows="5">{{ $serviceFaq->answer }}</textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center actions my-3">
                                <button role="button" class="btn btn-danger"> <i class="bi bi-trash"></i>
                                    {{ __('Delete') }}</button>
                                <button role="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i>
                                    {{ __('Update') }}</button>
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
