@extends('layouts.customer')


@section('title')
    Cửa hàng
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Trang chủ<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li><a href="#">Cửa hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="shop-container">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="shop-left">
                            <!-- Start accordion  -->
                            <div class="product-category">
                                @foreach ($allCategories as $category)
                                    <div class="accordion" id="category-accordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <span><a
                                                        href="{{ route('categories.detail', $category->slug) }}">{{ $category->name }}</a>({{ $category->products()->count() }})</span>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <!-- Form filter by price -->
                            <form action="{{ route('shop.filter') }}" method="GET" class="filter-form">
                                {{-- @csrf --}}
                                <h2>Lọc theo giá</h2>
                                <div class="filter-form__form--range-price">
                                    <div class="range-price__progress"></div>

                                    <input class="min-range" name="min_price" type="range" name="min-range" min="0"
                                        max="30000000" step="100000"
                                        @if (request('min_price')) value="{{ request()->min_price }}" @else value="0" @endif />
                                    <input class="max-range" name="max_price" type="range"
                                        @if (request('max_price')) value="{{ request()->max_price }}" @else value="30000000" @endif
                                        name="max-range" min="0" max="30000000" step="100000" value="30000000" />
                                    <div class="range-price__text">
                                        <div class="text-min">0</div>
                                        <div class="text-max">
                                            @if (request()->max_price)
                                                {{ number_format(request()->max_price) }}
                                            @else
                                                {{ number_format(30000000) }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit">Lọc</button>
                            </form>

                            <!-- related products -->
                            <div class="related-products">
                                <h3>Sản phẩm nổi bật</h3>
                                <div class="products-list">
                                    @foreach ($productTr as $product)
                                        <div class="product-item">
                                            @php
                                                $thumbnails = explode(',', $product->image);
                                            @endphp
                                            <a href="{{ route('product.detail', $product->slug) }}" class="item__img">
                                                <img src="{{ $thumbnails[0] }}" alt="" />
                                            </a>
                                            <div class="item__info">
                                                <a href="{{ route('product.detail', $product->slug) }}"
                                                    class="item__info--name">{{ $product->name }}</a>
                                                <p class="item__info--price">{{ $product->FormatSellingPrice() }}</p>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="shop-right">
                            @if ($products->count() > 0)
                                <div class="shop-right__title">
                                    <h3>Hiển thị {{ $products->count() }} kết quả</h3>
                                    <div class="product">
                                        <div class="container">
                                            <div class="product__list">
                                                @foreach ($products as $product)
                                                    <div class="product__item">
                                                        <div class="product__img">
                                                            @php
                                                                $thumbnails = explode(',', $product->image);
                                                            @endphp
                                                            <img class="first-img" src="{{ $thumbnails[0] }}"
                                                                alt="" />
                                                            <img class="second-img" src="{{ $thumbnails[1] }}"
                                                                alt="" />
                                                            <div class="view">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </div>
                                                        </div>
                                                        <div class="product__info">
                                                            {{-- <h3 class="info__cate">jewellery</h3> --}}
                                                            <a href="{{ route('product.detail', $product->slug) }}"
                                                                class="info__name">{{ $product->name }}</a>
                                                            <h3 class="info__price">{{ $product->FormatSellingPrice() }}
                                                            </h3>
                                                        </div>
                                                        <input type="hidden" readonly name="quantity" value="1">
                                                        <button class="addToCartButton" data-id="{{ $product->id }}">Thêm
                                                            vào giỏ</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">{{$products->links()}}</div>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <h2 class="text-light text-center mt-4">Không có sản phẩm thỏa mãn điều kiện tìm kiếm
                                    </h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
