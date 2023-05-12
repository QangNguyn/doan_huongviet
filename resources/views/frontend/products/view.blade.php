@extends('layouts.customer')
@section('title', $product->name)

@section('content')
    <div class="content">
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <div class="product-detail__slider">
                            <div id="sync1" class="owl-carousel owl-theme">
                                @php
                                    $thumbnails = explode(',', $product->image);
                                @endphp
                                @foreach ($thumbnails as $thumbnail)
                                    <div class="item">
                                        <img src="{{ $thumbnail }}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <div id="sync2" class="owl-carousel owl-theme">
                                @foreach ($thumbnails as $thumbnail)
                                    <div class="item">
                                        <img src="{{ $thumbnail }}" alt="" />
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="detail-info">
                            <h3 class="detail-info__name">{{ $product->name }}</h3>
                            <p class="detail-info__price">{{ $product->FormatSellingPrice() }}</p>
                            <div class="detail-info__des">
                                {!! $product->description !!}
                            </div>

                            <div class="button-wrap">
                                <label for="">Số lượng: </label>
                                <input type="number" min="1" value="1" id="count" />
                                <button class="addToCartButton d-block" data-id="{{ $product->id }}" <i
                                    class="fa fa-shopping-cart"></i>
                                    thêm vào giỏ hàng
                                </button><span style="font-size: 1.4rem">Có sẵn {{ $product->qty }} sản phẩm</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product">
            <div class="container">
                <h2>Sản phẩm liên quan</h2>
                <div class="owl-carousel owl-theme related-product__slider">
                    @foreach ($similarProducts as $product)
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
                                <a href="#" class="info__name">{{ $product->name }}</a>
                                <h3 class="info__price">{{ $product->FormatSellingPrice() }}</h3>
                            </div>
                            <input type="hidden" readonly name="quantity" value="1">
                            <button class="addToCartButton" data-id="{{ $product->id }}">Thêm vào giỏ</button>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var qty = {{ json_encode($product->qty) }};
        let countInput = document.querySelector('#count');
        countInput.addEventListener('input', () => {
            if (countInput.value > qty) {
                // alert(`Trong kho chỉ còn ${qty} sản phẩm`)
                Swal.fire({
                    title: "Số lượng không đủ",
                    text: `Trong kho chúng tôi chỉ còn ${qty} sản phẩm`,
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Không, hủy bỏ!",
                })
                countInput.value = qty;
            }
        })
    </script>
@endsection
