@extends('layouts.customer')


@section('title')
    Kết quả tìm kiếm
@endsection

@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                    <a href="#">Shop<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li><a href="#">Watch</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="search-result">
            <div class="container">
                <div class="shop-right">
                    <div class="search-result__title">
                        @if ($products->count() > 0)
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
                                                    <img class="first-img" src="{{ $thumbnails[0] }}" alt="" />
                                                    <img class="second-img" src="{{ $thumbnails[1] }}" alt="" />
                                                    <div class="view">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                </div>
                                                <div class="product__info">
                                                    {{-- <h3 class="info__cate">jewellery</h3> --}}
                                                    <a href="{{ route('product.detail', $product->slug) }}"
                                                        class="info__name">{{ $product->name }}</a>
                                                    <h3 class="info__price">
                                                        {{ $product->FormatSellingPrice() }}</h3>
                                                </div>
                                                <button>Thêm vào giỏ</button>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @else
                            <div>
                                <h2 class="text-center text-light">Không có sản phẩm thỏa mãn điều kiện</h2>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
