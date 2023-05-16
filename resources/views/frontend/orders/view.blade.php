@extends('layouts.customer')
@section('title')
    My Orders
@endsection

@section('content')
    <div style="padding: 3rem 0; background: #242424">

        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-4" style="font-size: 1.5rem">
                        <div class="card-head">
                            <a href="{{ route('my-order') }}" class="btn btn-outline-info my-1">Quay lại</a>
                            <h4 class="my-2">My Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="my-1">Họ & Tên</label>
                                    <div class="border p-2 mb-2">{{ $order->name }}</div>
                                    <label for="" class="my-1">Địa chỉ email</label>
                                    <div class="border p-2 mb-2">{{ $order->email }}</div>
                                    <label for="" class="my-1">Số điện thoại</label>
                                    <div class="border p-2 mb-2">{{ $order->phone }}</div>
                                    <label for="" class="my-1">Địa chỉ</label>
                                    <div class="border p-2 mb-2">
                                        {{ $order->address }}, {{ $ward->name }},{{ $district->name }},
                                        {{ $province->name }}
                                    </div>
                                </div>
                                <div class="col-md-6 table-responsive">
                                    <table class="table  align-middle text-center ">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Hình ảnh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td> {{ $item->product->name }} </td>
                                                    <td> {{ $item->qty }} </td>
                                                    <td> {{ $item->price }} </td>
                                                    <td>
                                                        @php
                                                            $thumbnails = explode(',', $item->product->image);
                                                        @endphp
                                                        <img style="width: 100px ; height:100px;"
                                                            src="{{ $thumbnails[0] }}" alt="{{ $item->product->name }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h4 class="p-4">Tổng tiền : <span class="float-end">
                                            {{ $order->total_price . 'đ' }}
                                        </span></h4>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
