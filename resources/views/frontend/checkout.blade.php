@extends('layouts.customer')

@section('title')
    Thanh toán
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Trang chủ<i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li><a href="#">Thông tin đặt hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div id="checkout" style="padding-top: 3rem">
            <div class="checkout__form">
                <div class="container">
                    @if (Cart::count() > 0)
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="checkout__form--billing">
                                    <div class="form__billing--title">Thông tin khách hàng</div>
                                    <form action="{{ url('place-order') }}" class="form__billing" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Họ & Tên</label>
                                            <input type="text" name="name">
                                            @error('name')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="email--phone">
                                            <div class="col-sm-12 col-md-6 ">
                                                <label for="email">địa chỉ email <span>*</span></label>
                                                <input type="text" name="email" id="email">
                                                @error('email')
                                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6 ">
                                                <label for="phone">số điện thoại <span>*</span></label>
                                                <input type="text" name="phone" id="phone"
                                                    placeholder="Số điện thoại...">
                                                @error('phone')
                                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tỉnh</label>
                                            <select name="province_id" class="form-control" id="province"
                                                value="{{ old('province_id') }}">
                                                <option value="">--Chọn tỉnh--</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Huyện</label>
                                            <select name="district_id" class="form-control" id="district"
                                                value="{{ old('district_id') }}">
                                                <option value="">--Chọn huyện--</option>
                                            </select>
                                            @error('district_id')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Xã</label>
                                            <select name="ward_id" class="form-control" id="ward"
                                                value="{{ old('ward_id') }}">
                                                <option value="">--Chọn xã--</option>
                                            </select>
                                            @error('ward_id')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="address">
                                            @error('address')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </form>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">

                                <div class="checkout__table--order">
                                    <h2>Hóa đơn</h2>

                                    <div class="table__order">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">sản phẩm</th>
                                                    <th class="product-total">tạm tính</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach (Cart::content() as $item)
                                                    <tr class="cart__item">
                                                        <td class="product-name">{{ $item->name }}
                                                            <span>x{{ $item->qty }}</span>
                                                        </td>
                                                        <td class="product-total">
                                                            {{ $item->price * $item->qty }}
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                            <tfoot>
                                                <tr class="order-total">
                                                    <td>Tổng cộng</td>
                                                    <td>
                                                        <p>
                                                            {{ explode('.', Cart::subtotal())[0] . ' đ' }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <div class="method__payment">
                                        <button class="method__payment--btn" type="submit">đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <h2 class="text-light">Giỏ hàng của bản hiện tại không có sản phẩm <a
                                    href="{{ route('shop.index') }}" class="text-primary">bấm
                                    vào đây</a> để tiếp tục mua sắm</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <style>
        .checkout-form input {

            font-size: 1rem;
            padding: 10px;
            font-weight: 400;
        }

        .checkout-form label {
            font-size: .9rem;
            font-weight: 700;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.method__payment--btn').click(function() {
                $('.form__billing').submit();
            })
            $('#province').change(function(e) {
                var province_id = $(this).val();

                if (province_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/province/') }}/' + province_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['districts'].length > 0) {
                            $("#district").empty();
                            $("#district").append("<option value=''>" + "--Chọn huyện--" +
                                "</option>")
                            $.each(response['districts'], function(key, value) {
                                $("#district").append("<option value='" + value['id'] +
                                    "'>" + value['name'] + "</option>")
                            });
                        }
                    }
                });
            });
            $('#district').change(function(e) {
                var district_id = $(this).val();

                if (district_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/district/') }}/' + district_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['wards'].length > 0) {
                            $("#ward").empty();
                            $("#ward").append("<option value=''>" + "--Chọn xã--" +
                                "</option>")
                            $.each(response['wards'], function(key, value) {
                                $("#ward").append("<option value='" + value['id'] +
                                    "'>" + value['name'] + "</option>")
                            });
                        }
                    }
                });
            });
        })
    </script>
@endsection
@section('css')
    <style>
        .checkout-form input {

            font-size: 1rem;
            padding: 10px;
            font-weight: 400;
        }

        .checkout-form label {
            font-size: .9rem;
            font-weight: 700;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.method__payment--btn').click(function() {
                $('.form__billing').submit();
            })
            $('#province').change(function(e) {
                var province_id = $(this).val();

                if (province_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/province/') }}/' + province_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['districts'].length > 0) {
                            $("#district").empty();
                            $("#district").append("<option value=''>" + "--Chọn huyện--" +
                                "</option>")
                            $.each(response['districts'], function(key, value) {
                                $("#district").append("<option value='" + value['id'] +
                                    "'>" + value['name'] + "</option>")
                            });
                        }
                    }
                });
            });
            $('#district').change(function(e) {
                var district_id = $(this).val();

                if (district_id == "") {
                    var country_id = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('/district/') }}/' + district_id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response['wards'].length > 0) {
                            $("#ward").empty();
                            $("#ward").append("<option value=''>" + "--Chọn xã--" +
                                "</option>")
                            $.each(response['wards'], function(key, value) {
                                $("#ward").append("<option value='" + value['id'] +
                                    "'>" + value['name'] + "</option>")
                            });
                        }
                    }
                });
            });
        })
    </script>
@endsection
