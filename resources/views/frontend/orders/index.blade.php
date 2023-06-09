@extends('layouts.customer')
@section('title')
    Đơn hàng của tôi
@endsection

@section('content')
    <div style="background: #242424;padding: 3rem 0">
        <div class="container ">
            <div class="row">
                <div class="col-md-12" style="font-size:2rem">
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
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td> {{ $item->tracking_no }} </td>
                                            <td> {{ $item->total_price }}</td>
                                            <td> {{ $item->status == '0' ? 'Đang vận chuyển' : 'Đã giao hàng' }} </td>
                                            <td>
                                                <a href="{{ url('don-hang/' . $item->id) }}"
                                                    class="btn btn-outline-info d-inline-block px-4 py-3 fs-4 me-3">Xem</a>
                                                @if ($item->status == 0)
                                                    <a href="{{ route('remove-order', $item->id) }}"
                                                        class="btn btn-outline-info d-inline-block px-4 py-3 fs-4">Hủy</a>
                                                @else
                                                @endif

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
    </div>
@endsection
