@extends('backend.layout.backend')
@section('content')
    <!-- Breadcrumbs -->
    <div class="sk-breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('backend') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('backend.products.index') }}">{{ __('Products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="posts">{{ __('Edit Product') }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="row">
        <div class="sk-page-actions col-md-12">
            <div class="sk-page-actions-left">
                <a class="btn btn-primary" href="{{ route('backend.products.index') }}"><i
                        class="bi bi-arrow-left-circle"></i> {{ __('Back') }}</a>
            </div>
            <div class="sk-page-actions-right">
                <button type="button" data-id="{{ $product->id }}" data-model="Product"
                    class="btn btn-secondary show-seo-modal">
                    <i class="bi bi-google"></i> {{ __('SEO') }}
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <form class="panel-body" action="/backend/products/update/{{ $product->id }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <!-- Product Name -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Product Name') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about product
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Name and product Slug') }}</small>
                                <div class="form-group mb-2">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" name="slug" id="slug" class="form-control"
                                        value="{{ $product->slug }}">
                                </div>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Product Description') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Description about product
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                that will be shown on a frontent') }}</small>
                                <div class="form-group mb-2">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control tinymce" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                                </div>
                                <!-- Product Fields Default Postition-->
                                @foreach ($productFields as $field)
                                    @if ($field['position'] == 'default')
                                        @if ($field->type == 'textarea')
                                            <div class="form-group mb-2">

                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <textarea name="{{ $field->name }}" class="form-control {{ $field->attr_class }}" id="{{ $field->attr_id }}"
                                                    cols="30" rows="10">{{ $field->value }}</textarea>
                                            </div>
                                        @endif
                                        @if ($field->type == 'text')
                                            <div class="form-group mb-2">
                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <input type="text" name="{{ $field->name }}"
                                                    class="form-control {{ $field->attr_class }}"
                                                    id="{{ $field->attr_id }}" value="{{ $field->value }}">
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <!-- #Product Fields Default Postition -->
                            </div>
                        </div>

                        <!-- Metas -->
                        @foreach ($productMetas as $key => $metaOption)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="p-0 m-0 text-capitalize">{{ __($metaOption['name']) }}</h5>
                                        <a href="javascript:void(0)"></a>
                                        <small> <i class="fa fa-info-circle text-info"></i>
                                            {{ __($metaOption['description']) }}</small>
                                    </div>
                                    <div class="{{ $metaOption['name'] }}-items-contaner">
                                        @foreach ($product->meta as $meta)
                                            @if ($meta->type == $metaOption['name'])
                                                <!-- Meta item -->
                                                <div
                                                    class="meta-item border-bottom p-2 d-flex justify-content-between align-items-center w-100 mb-2 metaItem{{ $meta->id }}">
                                                    <div class="d-flex align-items-center">
                                                        <span class="fs-6 me-1 p-1">{{ $meta->name }}</span>
                                                        <div> <img width="32"
                                                                src="{{ $storageUrl }}/{{ $meta->value }}"
                                                                alt=""> </div>
                                                        <a href="javascript:void(0);"
                                                            onclick="removeMeta({{ $meta->id }})"
                                                            class="btn btn-danger rounded-circle btn-sm meta-remove"
                                                            title="Remove">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Add meta item -->
                                    <div class="meta-item-add mt-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6 class="p-0 m-0">{{ __('Add ' . $metaOption['name']) }}</h6>
                                            <a href="javascript:void(0)"></a>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="text-capitalize"
                                                    for="{{ $metaOption['name'] }}Key">{{ __($metaOption['name']) }}</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="{{ $metaOption['name'] }}-key"
                                                    id="{{ $metaOption['name'] }}Key">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" id="{{ $metaOption['name'] }}ValueType"
                                                    value="{{ $metaOption['valueType'] }}">
                                                <!-- File -->
                                                @if (isset($metaOption['valueType']) && $metaOption['valueType'] != '')
                                                    <div class="mb-3">
                                                        <label for="{{ $metaOption['name'] }}Value">Value</label>
                                                        <input class="form-control form-control-sm"
                                                            name="{{ $metaOption['name'] }}-key" type="file"
                                                            id="{{ $metaOption['name'] }}Value">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <a href="javascript:void(0)"
                                                    onclick="addMeta('{{ $metaOption['name'] }}')"
                                                    class="btn btn-primary btn-sm w-100">+ {{ __('Add') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Product Gallery -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <input type="file" name="image" id="imageFileInput" class="form-control d-none">
                                <div class="heading d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="p-0 m-0">{{ __('Product Images') }}</h6>
                                        <small><i
                                                class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Add your product
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        images') }}</small>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-image-gallery">
                                        {{ __('Add Image') }}
                                    </button>

                                </div>
                                <div class="gallery-images row mt-3">
                                    @foreach ($product->files as $image)
                                        <div class="gallery-item col-md-4 mb-2" id="gallery-image-{{ $image->id }}">
                                            <a href="javascript:void(0)" data-id="{{ $image->id }}"
                                                data-product-id="{{ $product->id }}" role="button"
                                                class="btn btn-danger rounded-circle btn-sm position-absolute btn-remove-image">
                                                <i class="bi bi-trash"></i> </a>
                                            <img src="/storage/{{ $image->path }}" class="img-thumbnail"
                                                alt="...">
                                        </div>
                                    @endforeach
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
                        <!-- Product Status -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Created:</b>
                                    <span>{{ $product->created_at }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Updated:</b>
                                    <span>{{ $product->updated_at }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <b>Status:</b>
                                    @if ($product->status == 'draft')
                                        <span class="badge bg-warning">{{ __('Draft') }}</span>
                                    @endif
                                    @if ($product->status == 'published')
                                        <span class="badge bg-success">{{ __('Published') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="template">{{ __('Change Status') }}</label>
                                    <select name="status" id="status" class="form-select"
                                        value="{{ $product->status }}">
                                        <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>
                                            {{ __('Draft') }}
                                        </option>
                                        <option value="published" {{ $product->status == 'published' ? 'selected' : '' }}>
                                            {{ __('Published') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center actions my-3">
                            <button role="button" class="btn btn-danger"> <i class="bi bi-trash"></i>
                                {{ __('Delete') }}</button>
                            <button role="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i>
                                {{ __('Update') }}</button>
                        </div>

                        <!-- Product Price -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="p-0 m-0">{{ __('Product Price') }}</h6>
                                <small><i
                                        class="bi bi-info-circle-fill text-info me-1"></i>{{ __('Information about product
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                price') }}</small>
                                <div class="form-group mb-3">
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <input name="price" id="price" type="text" class="form-control"
                                            value="{{ $product->price }}">
                                        <span class="input-group-text">{{ $currency }}</span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="priceAvans">{{ __('Price Avans') }}</label>
                                    <div class="input-group">
                                        <input name="price_avans" id="priceAvans" type="text" class="form-control"
                                            value="{{ $product->price_avans }}">
                                        <span class="input-group-text">{{ $currency }}</span>
                                    </div>
                                </div>
                                <!-- Product Fields Price Postition-->
                                @foreach ($productFields as $field)
                                    @if ($field['position'] == 'price')
                                        @if ($field->type == 'textarea')
                                            <div class="form-group mb-3">
                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <textarea name="{{ $field->name }}" class="form-control {{ $field->attr_class }}" id="{{ $field->attr_id }}"
                                                    cols="30" rows="10">{{ $field->value }}</textarea>
                                            </div>
                                        @endif
                                        @if ($field->type == 'text')
                                            <div class="form-group mb-2">
                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <input type="text" name="{{ $field->name }}"
                                                    class="form-control {{ $field->attr_class }}"
                                                    id="{{ $field->attr_id }}" value="{{ $field->value }}">
                                            </div>
                                        @endif
                                        @if ($field->type == 'price')
                                            <div class="form-group mb-3">
                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <div class="input-group">
                                                    <input name="{{ $field->name }}" id="{{ $field->attr_id }}"
                                                        type="text" class="form-control" value="{{ $field->value }}">
                                                    <span class="input-group-text">{{ $currency }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <!-- #Product Fields Price Postition -->
                            </div>
                        </div>
                        <!-- Product Categories -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="productsCategories">Categories</label>
                                    <select name="categories[]" id="productsCategories" multiple class="form-select">
                                        @foreach ($productCategories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, $productCategoriesIds) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="highlighted" {{ $product->highlighted ? 'checked' : '' }}
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label"
                                            for="flexSwitchCheckDefault">{{ __('Highlighted') }}</label>
                                    </div>
                                </div>

                                <!-- Product Fields Sidebar Postition-->
                                @foreach ($productFields as $field)
                                    @if ($field['position'] == 'sidebar')
                                        @if ($field->type == 'textarea')
                                            <div class="form-group mb-2">

                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <textarea name="{{ $field->name }}" class="form-control {{ $field->attr_class }}" id="{{ $field->attr_id }}"
                                                    cols="30" rows="10">{{ $field->value }}</textarea>
                                            </div>
                                        @endif
                                        @if ($field->type == 'text')
                                            <div class="form-group mb-2">
                                                <label class="w-100" for="">{{ $field->label }}</label>
                                                @if ($field->description != '')
                                                    <small><i class="bi bi-info-circle-fill text-info me-1"></i>
                                                        {{ $field->description }}
                                                    </small>
                                                @endif
                                                <input type="text" name="{{ $field->name }}"
                                                    class="form-control {{ $field->attr_class }}"
                                                    id="{{ $field->attr_id }}" value="{{ $field->value }}">
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <!-- #Product Fields Sidebar Postition -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>👨‍💻 Developers Options</h4>
                                <div class="form-group mb-2">
                                    <label for="externalId">{{ __('External ID') }}</label>
                                    <input type="text" name="external_id" id="externalId" class="form-control"
                                        value="{{ $product->external_id }}">
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
        var APP_STORAGE_URL = window.location.origin + "/storage";
        var PRODUCT_ID = '{{ $product->id }}';
        // Add meta
        function addMeta(type) {
            let metaName = $('#' + type + 'Key').val();
            let metaValueType = $('#' + type + 'ValueType').val();

            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('type', type);
            formData.append('name', metaName);
            formData.append('product_id', "{{ $product->id }}");

            // Value
            if (metaValueType == 'file') {
                formData.append('value', $('#' + type + 'Value')[0].files[0]);
            } else {
                formData.append('value', $('#' + type + 'Value').val());
            }

            $.ajax({
                url: "{{ route('backend.products.meta.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    let newMeta =
                        '<div class="meta-item border-bottom p-2 d-flex justify-content-between align-items-center w-100 mb-2 metaItem' +
                        response.meta.id + '">' +
                        '<div class="d-flex align-items-center">' +
                        '<span class="fs-6 me-1 p-1">' + response.meta.name + '</span>' +
                        '<div> <img width="32" src="' + APP_STORAGE_URL + '/' + response.meta.value +
                        '" alt=""> </div>' +
                        '<a href="javascript:void(0);" onclick="removeMeta(' + response.meta.id +
                        ')" data-id="' + response.meta.id +
                        '" class="btn btn-danger rounded-circle btn-sm meta-remove" title="Remove">' +
                        '<i class="bi bi-trash"></i>' +
                        '</a>' +
                        '</div>' +
                        '</div>';

                    let metaContainer = $('.' + type + '-items-contaner')
                    metaContainer.append(newMeta);

                    $('#' + type + 'Key').val('');
                    // Value need to handle empty
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __('Successfully added!') }}'
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'There is an error adding '
                    });
                },
            });
        }

        // Remove meta
        function removeMeta(id) {
            Swal.fire({
                title: "{{ __('Are you sure you want to delete?') }}",
                text: "{{ __('This action cannot be revoked and the data will be deleted forever') }}",
                showCancelButton: true,
                confirmButtonText: "{{ __('Delete') }}",
                icon: "question",
                confirmButtonColor: "#0d6efd",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: APP_URL + "/backend/products/meta/delete/" + id,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE",
                        },
                        success: function(response) {
                            $(".metaItem" + response.meta.id).remove()
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully removed!'
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'There is an error removing ' + response.meta.type
                            });
                        },
                    });
                }
            });
        }

        function removeImage(productId, imageId) {
            // /backend/products/{productId}/images/remove/{imageId}
            Swal.fire({
                title: "{{ __('Are you sure you want to delete?') }}",
                text: "{{ __('This action cannot be revoked and the data will be deleted forever') }}",
                showCancelButton: true,
                confirmButtonText: "{{ __('Delete') }}",
                icon: "question",
                confirmButtonColor: "#0d6efd",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: APP_URL + "/backend/products/" + productId + "/images/remove/" + imageId,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE",
                        },
                        success: function(response) {
                            $("#gallery-image-" + imageId).remove()
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully removed!'
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'There is an error removing ' + response.meta.type
                            });
                        },
                    });
                }
            });
        }

        // Remove image from gallery
        $('.btn-remove-image').on('click', function() {
            let id = $(this).data('id');
            let productID = $(this).data('product-id');
            removeImage(productID, id);
        });


        // Trigger gallery update
        $('.btn-image-gallery').click(function() {
            $('#imageFileInput').trigger('click');
        });

        $(document).on('change', '#imageFileInput', function() {
            var totalImages = document.getElementById('imageFileInput').files.length;
            var formData = new FormData();
            for (var x = 0; x < totalImages; x++) {
                formData.append("images[]", document.getElementById('imageFileInput').files[x]);
            }
            formData.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: APP_URL + "/backend/products/images/store/" + PRODUCT_ID,
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    response.data.forEach(image => {
                        let newImage =
                            '<div class="gallery-item col-md-4 mb-2" id="gallery-image-' + image
                            .id + '">' +
                            '<a href="javascript:void(0)" data-id="' + image.id +
                            '" role="button" class="btn btn-danger btn-circle text-white position-absolute btn-remove-image"> <i class="fa fa-trash"></i> </a>' +
                            '<img src="' + APP_STORAGE_URL + '/' + image.path +
                            '" class="img-thumbnail" alt="...">' +
                            '</div>'
                        $(".gallery-images").append(newImage);
                    })
                    console.log(response)
                    Swal.fire({
                        icon: 'success',
                        title: 'Images successfully added!'
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'There is an error uploading image!'
                    });
                },
            });
        });


        $(document).ready(function() {
            if ($('#highlighted').is(":checked")) {
                $('.landing').removeClass('d-none');
            } else {
                $('.landing').addClass('d-none');
            }

            $('#highlighted').change(function() {
                if ($(this).is(":checked")) {
                    $('.landing').removeClass('d-none');
                } else {
                    $('.landing').addClass('d-none');
                }
            });
        });
    </script>
@endsection
