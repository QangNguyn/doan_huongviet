@extends('layouts.customer')


@section('title')
    Giỏ hàng
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Trang chủ<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li><a href="">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <!-- cart -->
        @if ($cartItems->count() > 0)
            <div id="page-cart">
                <div class="cart-table">
                    <div class="container ">
                        <div class="row mb-5">
                            <div class="col-12 ">
                                <form action="#" class="cart-table--responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td class="cart-table--image"><span>hình ảnh</span></td>
                                                <td class="cart-table--product"><span>sản phẩm</span></td>
                                                <td class="cart-table--price"><span>giá</span></td>
                                                <td class="cart-table--quality"><span>số lượng</span></td>
                                                <td class="cart-table-total"><span>tạm tính</span></td>
                                                <td class="cart-table--remove"><span>xóa</span></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr>
                                                    <td class="cart-table--image"><img src="{{ $item->options['image'] }}"
                                                            alt="{{ $item->name }}">
                                                    </td>
                                                    <td class="cart-table--product"><a
                                                            href="#">{{ $item->name }}</a>
                                                    </td>
                                                    <td class="cart-table--price">
                                                        <span>{{ $item->price }}</span>
                                                    </td>
                                                    <td class="cart-table--quality"><input type="number"
                                                            value="{{ $item->qty }}" min="1"></td>
                                                    <td class="cart-table--total">
                                                        <span>{{ $item->price * $item->qty }}</span>
                                                    </td>
                                                    <td class="cart-table--remove"><a href="#"
                                                            data-id={{ $item->rowId }} class="deleteCartItem"><i
                                                                class="fa fa-times"></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-sm-12 col-md-8">
                                <ul class="coupon-redrect">
                                    <li><a id="update-cart-btn" href="#">Cập nhật giỏ hàng</a></li>
                                    <li><a href="{{ route('shop.index') }}">tiếp tục mua thêm</a></li>
                                </ul>

                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="cart-totals">
                                    <h2>Thanh toán</h2>
                                    <form action="">

                                        <div class="cart-totals--shipping">
                                            <div class="shipping-left"><label>giao hàng</label></div>
                                            <div class="shipping-right">

                                                <div>
                                                    <input type="checkbox" id="freeship">
                                                    <label for="freeship">Miễn phí giao hàng</label>
                                                </div>
                                                <div>Chi phí vận chuyển</div>
                                            </div>

                                        </div>
                                        <div class="cart-totals--total">
                                            <label>tổng cộng</label>
                                            <p>{{ explode('.', Cart::subtotal())[0] . ' đ' }}</p>
                                        </div>
                                        <button type="button"><a class="d-block text-light"
                                                href="{{ route('checkout') }}">Thanh toán</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row align-items-center" style="min-height: 300px;background-color: #2e2e2e;">
                <div class="col-12 text-center">
                    <h2 class="text-light">Giỏ hàng của bản hiện tại không có sản phẩm <a href="{{ route('shop.index') }}"
                            class="text-primary">bấm
                            vào đây</a> để tiếp tục mua sắm</h2>
                </div>
            </div>
        @endif

    </div>
@endsection


@section('scripts')
    <script></script>
@endsection
