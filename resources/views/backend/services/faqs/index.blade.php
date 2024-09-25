@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Services') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ $service->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="serviceFaqs">{{ __('Faqs') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary me-3" href="{{ route('backend.services.edit', $service->id) }}"><i
                        class="bi bi-arrow-left-circle"></i>
                    {{ __('Back') }}</a>
                <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary"><i
                        class="bi bi-plus-circle"></i> Add Service Faq</button>
                <form class="ms-3" action="/backend/services/{{ $service->id }}/faqs" method="GET">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}"
                            id="search" placeholder="🔍 {{ __('Search') }}">
                    </div>
                </form>
            </div>
            <div class="sk-page-actions-right">
                <a class="btn btn-secondary d-none" href="#"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="sk-table-wrapper">
                @if (count($serviceFaqs) > 0)
                    <table class="lp-table table">
                        <thead>
                            <th>#</th>
                            <th>{{ __('Question') }}</th>
                            <th>{{ __('Answer') }}</th>
                            <th width="120"></th>
                        </thead>
                        <tbody>
                            @foreach ($serviceFaqs as $key => $faq)
                                <tr id="tr-{{ $faq->id }}">
                                    <td>{{ $faq->id }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td class="lp-table-actions">
                                        <a class="btn btn-primary btn-sm rounded-circle"
                                            href="/backend/services/{{ $service->id }}/faqs/edit/{{ $faq->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button role="button" data-model="services/{{ $service->id }}/faqs"
                                            data-id="{{ $service->id }}"
                                            class="btn btn-danger btn-sm rounded-circle item-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $serviceFaqs->links() }}
                @else
                    <div class="sk-table-empty">
                        @if ($search != '')
                            {{ __('There is no service faqs for search:') }} <b
                                class="ms-2 text-warning">{{ $search }}</b>
                        @else
                            {{ __('There is no service faqs in database, you can create it') }} <a role="button"
                                data-bs-toggle="modal" data-bs-target="#createModal"> <span
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
                        <h5 class="modal-title">{{ __('Add Service Faq') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group mb-2">
                            <label for="serviceQuestion">{{ __('Question') }}</label>
                            <input type="text" name="question" id="serviceQuestion" class="form-control"
                                placeholder="Enter question">
                        </div>
                        <i
                            class="fas fa-info-circle text-info me-2"></i>{{ __('On next page you will add service details') }}
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="button" class="btn btn-primary"
                                onclick="serviceCreate()">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Create service
        function serviceCreate() {
            let createForm = $('#createForm');
            let question = $('#serviceQuestion').val();
            $.ajax({
                url: "{{ route('backend.services.faqs.store', $service->id) }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    question: question,
                },
                success: function(response) {
                    window.location.replace(response.url);
                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                },
            });
        }
    </script>
@endsection
