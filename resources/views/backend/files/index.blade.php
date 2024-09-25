@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="files">{{ __('Files') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <form class="ms-0" action="/backend/files" method="GET">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}" id="search"
                            placeholder="🔍 {{ __('Search') }}">
                    </div>

                </form>
                <a href="#" class="btn btn-secondary ms-2"><i class="bi bi-cloud-upload"></i>
                    {{ __('Upload Files') }}</a>
            </div>
            <div class="sk-page-actions-right">
                <a class="btn btn-secondary" href="#"><i class="bi bi-gear"></i></a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="sk-table-wrapper">
                @if (count($files) > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="50">#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th width="100px">{{ __('Size') }}</th>

                                <th>{{ __('Ext') }}</th>
                                <th width="125" class="text-center">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $key => $file)
                                <tr>
                                    <!-- Number -->
                                    <td class="text-center align-middle" scope="row"> <span>{{ $file->id }}</span>
                                    </td>
                                    <!-- Name -->
                                    <td>
                                        <div class="d-flex justify-center-start align-items-center">
                                            @if ($file->media_type == 'image')
                                                <div class="me-3">
                                                    <img style="width: 50px;height:50px; object-fit: cover; border-radius:5px"
                                                        src="{{ $storageUrl }}{{ $file->path }}" alt="">
                                                </div>
                                            @endif
                                            <span>{{ $file->name }}</span>
                                        </div>

                                    </td>
                                    <!-- Media Type -->
                                    <td class="">
                                        @if ($file->media_type == 'image')
                                            <i class="bi bi-file-earmark-image text-primary"></i>
                                        @else
                                            <i class="bi bi-file-earmark-font text-primary"></i>
                                        @endif
                                        {{ $file->media_type }}
                                    </td>
                                    <!-- Size -->
                                    <td class="">
                                        {{ number_format($file->size * 0.000001, 2) }} MB
                                    </td>
                                    <!-- Extension -->
                                    <td class="">
                                        {{ $file->extension }}
                                    </td>
                                    <!-- Actions -->
                                    <td class="text-center">
                                        <button role="button" data-model="files" data-id="{{ $file->id }}"
                                            class="btn btn-danger btn-sm rounded-circle item-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $files->links() }}
                @else
                    <div class="sk-table-empty">
                        @if ($search != '')
                            {{ __('There is no files for search:') }} <b class="ms-2 text-warning">{{ $search }}</b>
                        @else
                            {{ __('There is no files in database') }}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
