@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="doctors">{{ __('Doctors') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary"><i
                        class="bi bi-plus-circle"></i> Add Doctor</button>
                <form class="ms-3" action="/backend/doctors" method="GET">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}" id="search"
                            placeholder="🔍 {{ __('Search') }}">
                    </div>
                </form>
            </div>
            <div class="sk-page-actions-right">
                <a class="btn btn-secondary" href="{{ route('backend.doctors.settings') }}"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="sk-table-wrapper">
                @if (count($doctors) > 0)
                    <table class="lp-table table">
                        <thead>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Area') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th width="120"></th>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $key => $doctor)
                                <tr id="tr-{{ $doctor->id }}">
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->area }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td class="lp-table-actions">
                                        <a target="_blank" class="btn btn-info btn-sm rounded-circle"
                                            href="{{ route('frontend.doctor', $doctor->slug) }}">
                                            <i class="bi bi-globe"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm rounded-circle"
                                            href="/backend/doctors/edit/{{ $doctor->id }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button role="button" data-model="doctors" data-id="{{ $doctor->id }}"
                                            class="btn btn-danger btn-sm rounded-circle item-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $doctors->links() }}
                @else
                    <div class="sk-table-empty">
                        @if ($search != '')
                            {{ __('There is no doctors for search:') }} <b
                                class="ms-2 text-warning">{{ $search }}</b>
                        @else
                            {{ __('There is no doctors in database, you can create it') }} <a role="button"
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
                        <h5 class="modal-title">{{ __('Add Doctor') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group mb-2">
                            <label for="doctorName">{{ __('Doctor Name') }}</label>
                            <input type="text" name="name" id="doctorName" class="form-control"
                                placeholder="Enter doctor name">
                        </div>
                        <i
                            class="fas fa-info-circle text-info me-2"></i>{{ __('On next page you will add doctor details') }}
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="button" class="btn btn-primary"
                                onclick="doctorCreate()">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Create doctor
        function doctorCreate() {
            let createForm = $('#createForm');
            let name = $('#doctorName').val();
            $.ajax({
                url: "{{ route('backend.doctors.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
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
