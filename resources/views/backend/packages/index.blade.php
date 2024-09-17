@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="products">{{ __('Packages') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> {{ __('Add Gold Package') }}
                </button>
                <form class="ms-3" action="/backend/packages" method="GET">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}" id="search"
                            placeholder="🔍 {{ __('Search') }}">
                    </div>
                </form>
            </div>
            <div class="sk-page-actions-right">
                <a class="btn btn-secondary" href="{{ route('backend.packages.settings') }}"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="sk-table-wrapper">
                @if (count($packages) > 0)
                    <table class="lp-table table table-hover">
                        <thead>
                            <th>#</th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('Products') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th width="120"></th>
                        </thead>
                        <tbody>
                            @foreach ($packages as $key => $package)
                                <tr id="tr-{{ $package->id }}">
                                    <td>
                                        {{ $package->id }}
                                    </td>
                                    <td>{{ $package->name }}</td>
                                    <td>
                                        @foreach ($package->products as $key => $product)
                                            <span class="badge bg-primary text-light">{{ $product->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div><b>💰 @priceFormat($package->price)</b> {{ $currency }}</div>
                                    </td>
                                    <td class="lp-table-actions">
                                        <a target="_blank" class="btn btn-info btn-sm rounded-circle"
                                            href="{{ route('frontend.packages', $package->slug) }}">
                                            <i class="bi bi-globe"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm rounded-circle"
                                            href="/backend/packages/edit/{{ $package->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button role="button" data-model="packages" data-id="{{ $package->id }}"
                                            class="btn btn-danger btn-sm rounded-circle item-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $packages->links() }}
                @else
                    <div class="sk-table-empty">
                        @if ($search != '')
                            {{ __('There is no packages for search:') }} <b
                                class="ms-2 text-warning">{{ $search }}</b>
                        @else
                            {{ __('There is no packages in database, you can create it') }} <a data-bs-toggle="modal"
                                data-bs-target="#createModal" role="button"> <span
                                    class="ms-2">{{ __('here') }}</span> </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Create modal -->
    <div class="modal modal-alert fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" id="createForm" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Add Package') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group mb-2">
                            <label for="packageName">Package name</label>
                            <input type="text" name="name" id="packageName" required class="form-control"
                                placeholder="Enter your package name">
                        </div>
                        <i
                            class="fas fa-info-circle text-info me-2"></i>{{ __('On next page you will add package details') }}
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="button" class="btn btn-primary"
                                onclick="productCreate()">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Create product
        function productCreate() {
            let createForm = $('#createForm');
            let name = $('#packageName').val();
            $.ajax({
                url: "{{ route('backend.packages.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                },
                success: function(response) {
                    window.location.replace(response.url);
                },
                error: function(response) {
                    console.log(response)
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                },
            });
        }
    </script>
@endsection
