@extends('layouts.customer')


@section('title')
    Bài viết
@endsection

@section('content')
    <div class="content">
        <div class="blog-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-left">
                            <div class="blog-list">
                                @foreach ($blogs as $blog)
                                    <div class="blog-list-item">
                                        <div class="blog-title">
                                            <h2>
                                                <a href="{{ route('blogs.show', $blog->slug) }}"
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
                                            <img src="{{ $blog->image }}" alt="blog-image" />
                                        </div>
                                        <div class="blog-content text-white">
                                            <p>
                                                {!! $blog->content !!}
                                            </p>
                                        </div>
                                        <a class="read-more" href="{{ route('blogs.show', $blog->slug) }}">Continue reading
                                            →</a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-right">
                            <div class="search-blog">
                                <form action="{{ route('blogs.list') }}" method="GET">
                                    <input type="text" value="{{ $keyword ? $keyword : '' }}" name="keyword"
                                        placeholder="Tìm kiếm...." />
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
                            {{-- <div class="blog-box">
                                <h2>Meta</h2>
                                <ul>
                                    <li>
                                        <a href="blog-detail.html"> Log in </a>
                                    </li>
                                    <li>
                                        <a href="blog-detail.html"> Entries feed </a>
                                    </li>
                                    <li>
                                        <a href="blog-detail.html"> Comments feed </a>
                                    </li>
                                    <li>
                                        <a href="blog-detail.html">WordPress.org</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
