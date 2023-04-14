<!DOCTYPE html>
<html>

<head>
    <title>Thông tin đơn hàng</title>
</head>

<body>
    <h1>Đơn hàng mới từ {{ $order->name }}</h1>

    <p>Số đơn hàng: {{ $order->tracking_no }}</p>

    <p>Tổng tiền: {{ $order->total_price }} đ</p>

    <p>Địa chỉ giao hàng:</p>
    <p>
        {{ $province->name }}, {{ $district->name }}, {{ $ward->name }}, {{ $order->address }}
    </p>

    <p>Danh sách sản phẩm:</p>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->products->name }} ({{ $item->qty }} x {{ $item->price }} đ)</li>
        @endforeach
    </ul>



</body>

</html>
