<!DOCTYPE html>
<html>

<head>
    <title>Thông tin đơn hàng</title>
</head>

<body>
    <h1>Thông tin đơn hàng</h1>

    <p>Chào {{ $order->name }},</p>

    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Đơn hàng của bạn đã được xác nhận.</p>

    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->products->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Tổng giá trị đơn hàng: {{ $order->total_price }}</p>

    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
</body>

</html>
