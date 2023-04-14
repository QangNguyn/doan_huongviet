@extends('layouts.admin')


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="card-head">
                        <a href="{{ url('orders') }}" class="btn btn-primary my-1">Back</a>
                        <h4 class="my-2">Đơn hàng</h4>
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
                                    {{ $province->name }}, {{ $district->name }}, {{ $ward->name }}, {{ $order->address }}
                                </div>

                            </div>
                            <div class="col-md-6 table-responsive">
                                <table class="table  align-middle text-center ">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
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
                                <h4 class="px-2">Tổng giá : <span class="float-end">
                                        {{ $order->total_price }}</span></h4>
                                <div class="mt-3">
                                    <label for="">Trạng thái</label>
                                    <form action="{{ url('update-order/' . $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-control">
                                            <select name="order_status" class="form-select p-2">
                                                <option {{ $order->status == '0' ? 'selected' : '' }} value="0">Chưa
                                                    giải
                                                    quyết
                                                </option>
                                                <option {{ $order->status == '1' ? 'selected' : '' }} value="1">Hoàn
                                                    thành
                                                </option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info my-2 w-100"> Cập nhật </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
