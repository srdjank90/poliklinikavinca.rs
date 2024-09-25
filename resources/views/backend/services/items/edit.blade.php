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
                <li class="breadcrumb-item active" aria-current="item">{{ $serviceItem->name }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.services.items.index', $service->id) }}"><i
                        class="bi bi-arrow-left-circle"></i>
                    {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">

            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" enctype="multipart/form-data"
                action="/backend/services/{{ $service->id }}/items/update/{{ $serviceItem->id }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <!-- Service Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Service Name') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about service Name and service Slug') }}</small>
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $serviceItem->name }}">
                                </div>
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Item Data') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Data of service item') }}</small>

                                <div class="form-group mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{ $serviceItem->description }}</textarea>
                                </div>



                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="price">{{ __('Price') }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="price" id="price"
                                            value="{{ $serviceItem->price }}" class="form-control">
                                        <span class="input-group-text" id="basic-addon2">RSD</span>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="discount">{{ __('Discount') }}</label>
                                    <div class="input-group mb-3">
                                        <input type="number" min="1" max="99" name="discount" id="discount"
                                            value="{{ $serviceItem->discount }}" class="form-control">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>

                                </div>
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
