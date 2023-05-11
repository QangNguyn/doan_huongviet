@extends('layouts.customer')


@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="index.html">Trang chủ<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="blog-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-left">
                            <div class="blog-list-item">
                                <div class="blog-title">
                                    <h2>
                                        <a href="https://woodstock.temashdesign.me/watch/2016/02/20/oh-princess-leia-are-you-all-right/"
                                            rel="bookmark">{{ $blog->name }}</a>
                                    </h2>
                                    <div class="blog-date d-inline-block icon-content">
                                        <a class="d-flex align-items-center" href="#">
                                            <i class="fas fa-calendar"></i>
                                            <p>{{ $blog->created_at }}</p>
                                        </a>
                                    </div>

                                </div>
                                <div class="blog-image">
                                    <img src="{{ $blog->image }}" alt="{{ $blog->name }}" />
                                </div>
                                <div class="blog-content text-white">
                                    <p>
                                        {!! $blog->content !!}
                                    </p>

                                </div>
                            </div>
                            <hr />


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-right">
                            <div class="search-blog">
                                <form action="{{ route('blogs.list') }}" method="GET">
                                    <input type="text" name="keyword" placeholder="Tìm kiếm...." />
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="blog-box">
                                <h2>Bài viết gần đây</h2>
                                <ul>
                                    @foreach ($latestBlogs as $blog)
                                        <li>
                                            <a href="{{ route('blogs.show', $blog->slug) }}">
                                                {{ $blog->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            {{-- <div class="blog-box">
                                <h2>Latest Comments</h2>
                                <ul class="list-comment">
                                    <li>
                                        <div>
                                            <span>Temash Design on</span>
                                            <a href="blog-detail.html"> Oh, Princess Leia </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>Temash Design on</span>
                                            <a href="blog-detail.html"> Your time is limited… </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>Temash Design on</span>
                                            <a href="blog-detail.html"> Your time is limited… </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <span>Temash Design on</span>
                                            <a href="blog-detail.html"> Your time is limited… </a>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="blog-box">
                                <h2>Tags</h2>
                                <ul class="tag-list">
                                    @foreach ($tags as $tag)
                                        <a href="#">{{ $tag->name }}</a>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
