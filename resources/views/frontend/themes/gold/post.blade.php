@extends('frontend.themes.gold.layout.layout')
@section('title', isset($post->seo->title) ? $post->seo->title : $post->name)
@section('description', isset($post->seo->description) ? $post->seo->description : '')
@section('keywords', isset($post->seo->keywords) ? $post->seo->keywords : '')
@section('canonical', url()->current())
@section('content')

    <!-- Breadcrumbs Section -->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>{{ $post->title }}</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            <li>></li>
                            <li><a href="{{ route('frontend.posts') }}">Blog</a></li>
                            <li>></li>
                            <li>{{ $post->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs Section -->

    <!-- Blog Details Section -->
    <div class="blog_area blog_details">
        <div class="container">
            <div class="row">
                <!-- Blog Details -->
                <div class="col-lg-9 col-md-12">
                    <div class="blog_details_wrapper">
                        <div class="blog_thumb">
                            <a href="{{ $storageUrl }}{{ $post->image->path }}"><img class="w-100"
                                    src="{{ $storageUrl }}{{ $post->image->path }}" alt="{{ $post->title }}"></a>
                        </div>
                        <div class="blog_content">
                            <div class="sidebar_widget widget_categories">
                                <h3 class="widget_title">Sadržaj</h3>
                                <span class="text-gold">{!! $post->toc !!}</span>
                            </div>
                            <hr>
                            <div id="toc-content" class="post_content">
                                {!! $post->content !!}
                            </div>

                        </div>
                    </div>
                </div>
                <!-- #Blog Details -->
                <!-- Sidebar -->
                <div class="col-lg-3 col-md-12">
                    <aside class="blog_sidebar">



                        <!-- Categories -->
                        <div class="sidebar_widget widget_categories d-none">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">Ecommerce</a></li>
                            </ul>
                        </div>
                        <!-- #Categories -->

                        <!-- Recomended -->
                        <div class="sidebar_widget widget_categories">
                            <h3 class="widget_title">Naša preporuka</h3>
                            <x-products.item :product="$randomProduct" />
                        </div>

                        <!-- Zlatnici na poklon -->
                        <div class="mb-5">
                            <a href="{{ route('frontend.category.products', 'zlatnici-za-poklon') }}">
                                <img src="/themes/gold/assets/img/zlatna-plocica-baner.webp" alt="Zlatnici za poklon">
                            </a>
                        </div>

                        <!--recent post start-->
                        <div class="sidebar_widget recent_post">
                            <h3 class="widget_title">Saveti stručnjaka</h3>


                            @foreach ($menuPosts as $mPost)
                                <div class="sidebar_post">
                                    <div class="post_img">
                                        <a href="{{ route('frontend.post', $mPost->slug) }}">
                                            @if ($mPost->image)
                                                <img src="{{ $storageUrl }}{{ $mPost->image->path }}"
                                                    alt="{{ $post->title }}" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="post_text">
                                        <h3><a href="{{ route('frontend.post', $mPost->slug) }}">{{ $mPost->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!--recent post end-->

                    </aside>
                </div>
                <!-- #Sidebar -->
            </div>
        </div>
    </div>
    <!-- #Blog Details Section -->


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Assuming you have an HTML string or element containing headings
            var htmlContent = document.getElementById('toc-content').innerHTML;


            // Create a temporary div to hold the HTML content
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = htmlContent

            // Get all heading elements (h1, h2, h3, etc.)
            var headingElements = tempDiv.querySelectorAll('h1, h2, h3, h4, h5, h6');

            // Use forEach loop to add id attribute to each heading
            headingElements.forEach(function(heading, index) {
                heading.id = 'section' + (index + 1); // You can customize the id as needed
            });

            document.getElementById('toc-content').innerHTML = tempDiv.innerHTML
        });
    </script>
@endsection
