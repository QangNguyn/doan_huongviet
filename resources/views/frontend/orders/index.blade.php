@extends('layouts.customer')
@section('title')
    My Orders
@endsection

@section('content')
    <div class="py-5">

    </div>

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="card-head">
                        <h4>Đơn hàng của tôi</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Mã số đơn hàng</th>
                                    <th>Tổng giá</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td> {{ $item->tracking_no }} </td>
                                        <td> {{ $item->total_price }}</td>
                                        <td> {{ $item->status == '0' ? 'Đang vận chuyển' : 'Đã giao hàng' }} </td>
                                        <td>
                                            <a href="{{ url('don-hang/' . $item->id) }}" class="btn btn-outline-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
