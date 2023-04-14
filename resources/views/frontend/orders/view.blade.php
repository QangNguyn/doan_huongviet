@extends('layouts.customer')
@section('title')
    My Orders
@endsection

@section('content')
    <div class="py-5"></div>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="card-head">
                        <a href="{{ route('my-order') }}" class="btn btn-outline-info my-1">Back</a>
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
                                <div class="border p-2 mb-2">{{ $order->address1 }}</div>
                                <label for="" class="my-1">Địa chỉ khác</label>
                                <div class="border p-2 mb-2">{{ $order->address1 }}</div>
                            </div>
                            <div class="col-md-6 table-responsive">
                                <table class="table  align-middle text-center ">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Hình ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td> {{ $item->products->name }} </td>
                                                <td> {{ $item->qty }} </td>
                                                <td> {{ $item->price }} </td>
                                                <td>
                                                    @php
                                                        $thumbnails = explode(',', $item->products->image);
                                                    @endphp
                                                    <img style="width: 100px ; height:100px;" src="{{ $thumbnails[0] }}"
                                                        alt="{{ $item->products->name }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total : <span class="float-end">
                                        {{ number_format($order->total_price).'đ' }}</span></h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-3"></div>
@endsection
