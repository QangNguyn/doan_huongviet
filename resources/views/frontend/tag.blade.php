@extends('layouts.customer')


@section('title')
    Tag
@endsection

@section('content')
    <!-- breadcrumbs-area-start -->
    <!-- breadcrumbs-area-end -->

    <div class="blog-main-area name-tag-area">
        <div class="container">
            <div class="row flex-row">
                <div class="name-tag">
                    <h2>{{ $tag->name }}</h2>
                </div>
                @foreach ($tag->blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-main-wrapper">
                            <div class="single-blog-post">
                                <div class="blog-img">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">
                                        <img src="{{ $blog->image }}" alt="{{ $blog->name }}" /></a>
                                </div>
                                <div class="single-blog-content">
                                    <div class="single-blog-title">
                                        <h3>
                                            <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="blog-single-content">
                                        <p>
                                            {{ $blog->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endsection
