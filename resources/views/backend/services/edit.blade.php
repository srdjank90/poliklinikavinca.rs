@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.services.index') }}">{{ __('Services') }}</a></li>
                <li class="breadcrumb-item active" aria-current="services">{{ __('Edit Service') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.services.index') }}"><i
                        class="bi bi-arrow-left-circle"></i>
                    {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">
                <a href="{{ route('backend.services.faqs.index', $service->id) }}" class="btn btn-secondary me-3">
                    <i class="bi bi-item"></i> {{ __('Service Faqs') }}
                </a>
                <a href="{{ route('backend.services.items.index', $service->id) }}" class="btn btn-secondary me-3">
                    <i class="bi bi-item"></i> {{ __('Service Items') }}
                </a>
                <button type="button" data-id="{{ $service->id }}" data-model="Service"
                    class="btn btn-secondary show-seo-modal">
                    <i class="bi bi-google"></i> {{ __('SEO') }}
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" enctype="multipart/form-data" action="/backend/services/update/{{ $service->id }}"
                method="POST">
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
                                        value="{{ $service->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ $service->slug }}">
                                </div>
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Service Content') }}</h6>

                                <div class="form-group mb-3">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ $service->title }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                                        value="{{ $service->subtitle }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{ $service->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">{{ __('Content') }}</label>
                                    <textarea class="form-control tinymce" name="content" id="content" cols="30" rows="10">{{ $service->content }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <!-- Service Statistic -->
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
                        <!-- Service Status -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Created:</b>
                                    <span>{{ $service->created_at }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Updated:</b>
                                    <span>{{ $service->updated_at }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center actions my-3">
                            <button role="button" class="btn btn-danger"> <i class="bi bi-trash"></i>
                                {{ __('Delete') }}</button>
                            <button role="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i>
                                {{ __('Update') }}</button>
                        </div>

                        <!-- Service Image -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="serviceImage" class="w-100">{{ __('Image') }}</label>
                                    @if ($service->image)
                                        <img width="150" src="{{ $storageUrl }}{{ $service->image->path }}"
                                            alt="">
                                    @endif
                                    <input class="form-control form-control-sm" name="service_image" id="serviceImage"
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
        // TinyMCE
        tinymce.init({
            selector: ".tinymce-toc",
            plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount",
            toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
            setup: function(editor) {
                // Add a listener for the input event
                editor.on('input', function() {
                    updateTableOfContents(editor);
                });
            },
        });
        // Update table of content TOC
        function updateTableOfContents(editor) {
            // Get the content from the editor
            const content = editor.getContent();
            // Extract headings (assuming using h1 to h6 for TOC)
            //const headings = content.match(/<h[1-6].*?>(.*?)<\/h[1-6]>/gi);
            const headings = content.match(/<h2.*?>(.*?)<\/h2>/gi);
            // Build the Table of Contents HTML
            const tocHTML = headings ?
                headings.map((heading, index) => `<a class="toc-list-item" href="#section${index + 1}">${heading}</a>`)
                .join('') :
                'No headings found';
            console.log(tocHTML);
            // Update the TOC element
            document.getElementById('toc-html').innerHTML = tocHTML;
            document.getElementById('toc').value = tocHTML;
        }

        $(document).ready(function() {

        });
    </script>
@endsection
