@extends('frontend.themes.gold.layout.layout')
@section('title', 'Zlatni Standard | Investiciono zlato | Prodaja Investicionog zlata | Blog')
@section('description', '')
@section('keywords', '')
@section('canonical', url()->current())
@section('content')
    <!-- Breadcrumbs Section -->
    <div class="breadcrumbs_area product_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Početna</a></li>
                            @if (isset($selectedCategory))
                                <li>></li>
                                <li><a href="{{ route('frontend.posts') }}">Blog</a></li>
                                <li>></li>
                                <li>{{ $selectedCategory->name }}</li>
                            @else
                                <li>></li>
                                <li>Blog</li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #Breadcrumbs Section -->

    <!-- Blog -->
    <div class="blog_area blog_none">
        <div class="container">
            <!--blog grid area start-->
            <div class="blog_grid_area">
                @foreach ($posts as $post)
                    <div class="blog_grid">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="blog_thumb">
                                    <a href="{{ route('frontend.post', $post->slug) }}">
                                        @if ($post->image)
                                            <img src="{{ $storageUrl }}{{ $post->image->path }}" alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="blog_content">
                                    <h3 class="post_title"><a
                                            href="{{ route('frontend.post', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p class="post_desc">{!! $post->excerpt !!}</p>
                                    <a class="btn-theme-light"
                                        href="{{ route('frontend.post', $post->slug) }}">Detaljnije</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!! $posts->links() !!}
                @if (count($posts) == 0)
                    <div class="col-12">
                        <h4 class="text-center">
                            @if (isset($selectedCategory))
                                Nema postova u izabranoj kategoriji
                            @else
                                Nema postova
                            @endif
                        </h4>
                    </div>
                @endif


            </div>
            <!--blog grid area start-->
        </div>
    </div>
    <!-- #Blog -->

@endsection
@section('scripts')
    <script></script>
@endsection
