@extends('layouts.customer')


@section('title')
    Tag
@endsection

@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul class="d-flex">
                            <li>
                                <a href="{{ route('home') }}">Home<i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#" class="active">Name Tag</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <div class="blog-main-area name-tag-area">
        <div class="container">
            <div class="row flex-row">
                <div class="name-tag">
                    <h2>{{ $tag->name }}</h2>
                    <p>{!! $tag->description !!}</p>
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
                                            {!! $blog->content !!}
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
