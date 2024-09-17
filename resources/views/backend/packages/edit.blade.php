@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.packages.index') }}">{{ __('Packages') }}</a></li>
                <li class="breadcrumb-item active" aria-current="packages">{{ __('Edit Package') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.packages.index') }}"><i
                        class="bi bi-arrow-left-circle"></i> {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">
                <button type="button" data-id="{{ $package->id }}" data-model="GoldPackage"
                    class="btn btn-secondary show-seo-modal">
                    <i class="bi bi-google"></i> {{ __('SEO') }}
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" action="/backend/packages/update/{{ $package->id }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <!-- Package Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Package Name') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about package Name and package Slug') }}</small>
                                <div class="form-group mb-2">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $package->name }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ $package->slug }}">
                                </div>
                            </div>
                        </div>
                        <!-- Package Description -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Package Description') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Description about package that will be shown on a frontent') }}</small>
                                <div class="form-group mb-2">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control tinymce" name="description" id="description" cols="30" rows="10">{{ $package->description }}</textarea>
                                </div>

                            </div>
                        </div>

                        <!-- Package Products -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="packageProducts">Products</label>
                                    <select name="products[]" id="packageProducts" multiple class="form-select"
                                        style="height: 300px">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ in_array($product->id, $productsIds) ? 'selected' : '' }}>
                                                {{ $product->name }} - {{ $product->price }} {{ $currency }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- Product Statistic -->
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
                        <!-- Package Status -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Created:</b>
                                    <span>{{ $package->created_at }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Updated:</b>
                                    <span>{{ $package->updated_at }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center actions my-3">
                            <button role="button" class="btn btn-danger"> <i class="bi bi-trash"></i>
                                {{ __('Delete') }}</button>
                            <button role="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i>
                                {{ __('Update') }}</button>
                        </div>

                        <!-- Package Price -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Package Price') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about package price') }}</small>
                                <div class="form-group mb-3">
                                    <label for="price">{{ __('Price') }}</label>
                                    <div class="input-group">
                                        <input name="price" id="price" type="text" class="form-control"
                                            value="{{ $package->price }}">
                                        <span class="input-group-text">{{ $currency }}</span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="priceDynamic">{{ __('Price Dynamic') }}</label>
                                    <div class="input-group">
                                        <input readonly id="priceDynamic" type="text" class="form-control"
                                            value="{{ $package->price_dynamic }}">
                                        <span class="input-group-text">{{ $currency }}</span>
                                    </div>
                                </div>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('If you activate dynamic price calculation, price of package will be calculated with all prices of products that are selected in package') }}</small>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        name="dynamic_price_activate"
                                        {{ $package->dynamic_price_activate ? 'checked' : '' }}
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label"
                                        for="flexSwitchCheckDefault">{{ __('Dynamic Price Calculation') }}</label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var APP_URL = window.location.origin;
    </script>
@endsection
