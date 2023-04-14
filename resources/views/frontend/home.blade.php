@extends('layouts.customer')


@section('title')
    Trang chủ
@endsection

@section('content')
    <!-- start banner -->
    <div class="banner">
        <div class="owl-carousel owl-theme home-slider">
            @foreach ($sliders as $slider)
                <div>
                    <div class="banner__content">
                        <h2 class="">{{ $slider->title }}</h2>
                        <div class="content__text">
                            <p>
                                {{ $slider->content }}
                            </p>
                            <p>Giá chỉ từ</p>
                            <p>12.000.000VNĐ</p>
                        </div>
                        <a href="{{ $slider->url_btn }}">{{ $slider->content_btn }}</a>
                    </div>
                    <img src="{{ $slider->image }}" alt="{{ $slider->title }}" />
                </div>
            @endforeach

        </div>
    </div>
    <!-- Start category -->

    <div class="category">
        <div class="container">
            <div class="category__title">
                <h3>Danh mục</h3>
                {{-- <a href="">Xem thêm</a> --}}
            </div>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-3">
                        <div data-aos="zoom-in">
                            <div class="category-item">
                                <div class="category-thumbnail">
                                    <a href="{{ route('categories.detail', $category->slug) }}">
                                        <img src="{{ $category->image }}" alt="" />
                                    </a>
                                </div>
                                <div class="category-text">

                                    <a href="{{ route('categories.detail', $category->slug) }}"
                                        class="category__name">{{ $category->name }}</a>
                                    <span>{{ $category->products->count() . ' sản phẩm' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Start best selling -->
    <div class="product">
        <div class="container">
            @if ($productSales->count() > 0)
                <div class="product__title">
                    <h3>Sản phẩm bán chạy</h3>
                </div>
                <div class="product__list">


                    @foreach ($productSales as $product)
                        <div class="product__item">
                            <div class="product__img">
                                @php
                                    $thumbnails = explode(',', $product->image);
                                @endphp
                                <img class="first-img" src="{{ $thumbnails[0] }}" alt="" />
                                <img class="second-img" src="{{ $thumbnails[1] }}" alt="" />
                                <div class="view"><i class="fa-regular fa-eye"></i></div>
                            </div>
                            <div class="product__info">
                                {{-- <h3 class="info__cate">jewellery</h3> --}}
                                <a href="{{ route('product.detail', $product->slug) }}"
                                    class="info__name">{{ $product->name }}</a>
                                <h3 class="info__price">{{ number_format($product->original_price) . 'đ' }}</h3>
                            </div>
                            <input type="hidden" readonly name="quantity" value="1">
                            <button class="addToCartButton" data-id="{{ $product->id }}">Thêm vào giỏ</button>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="product__title my-4">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="product__list">
                @foreach ($productTr as $product)
                    <div class="product__item">
                        <div class="product__img">
                            @php
                                $thumbnails = explode(',', $product->image);
                            @endphp
                            <img class="first-img" src="{{ $thumbnails[0] }}" alt="" />
                            <img class="second-img" src="{{ $thumbnails[1] }}" alt="" />
                            <div class="view"><i class="fa-regular fa-eye"></i></div>
                        </div>
                        <div class="product__info">
                            {{-- <h3 class="info__cate">jewellery</h3> --}}
                            <a href="{{ route('product.detail', $product->slug) }}"
                                class="info__name">{{ $product->name }}</a>
                            <h3 class="info__price">{{ $product->FormatSellingPrice() }}</h3>
                        </div>
                        <input type="hidden" readonly name="quantity" value="1">
                        <button class="addToCartButton" data-id="{{ $product->id }}">Thêm vào giỏ</button>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- start news -->
    <div class="news">
        <div class="container">
            <div class="news__title">
                <h3>Tin tức</h3>
            </div>
            <div class="news__slider owl-carousel owl-theme" id="news__slider">
                @foreach ($blogs as $blog)
                    <div class="news-item">
                        <div class="news-item__img">
                            <img src="{{ $blog->image }}" alt="" />
                        </div>
                        <div class="news-item__info">
                            <a href="#" class="item__title">
                                {{ $blog->name }}
                            </a>
                            <p class="item__time">
                                <i class="fa-solid fa-calendar-days"></i> {{ $blog->created_at }}
                            </p>
                            <p class="item__comment">
                                <i class="fa-solid fa-comment"></i>2 comments
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
