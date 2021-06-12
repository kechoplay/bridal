<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <th style="background-color: #1782f1;color: white"><a href="#">shop.com</a></th>
    <th style="background-color: #1782f1;color: white">THÔNG TIN ĐƠN ĐẶT HÀNG</th>
    </thead>
    <tbody>
    <td style="background-color: #1782f1;color: white">THÔNG TIN SẢN PHẨM</td>
    <td>
        <table>
            <thead>
            <th>Tên sản phẩm</th>
            <th>Số lượng mua</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            </thead>
            <tbody>
            @if( @$flagCart == 0)
                @foreach($arrayCart as $item)
                    <tr>
                        <td>{{ @$item['name'] }}</td>
                        <td>{{ @$item['number'] }}</td>
                        <td>{{ number_format($item['price']) }}</td>
                        <td>{{ number_format($item['price']*$item['number']) }}</td>
                    </tr>
                @endforeach
            @endif
            @if( @$flagCart == 1)
                <tr>
                    <td>{{ @$buyNow['name'] }}</td>
                    <td>{{ @$buyNow['number'] }}</td>
                    <td>{{ number_format($buyNow['price']) }}</td>
                    <td>{{ number_format($buyNow['price']) }}</td>
                </tr>
            @endif
            </tbody>
        </table>
        <br>
        <span style="font-weight: 700">TỔNG GIÁ TRỊ ĐƠN HÀNG:</span>
        <span>
                 @if(@$flagCart == 0 )
                {{ number_format($total) }} VNĐ
            @endif
            @if(@$flagCart == 1 )
                {{ number_format($buyNow['price']) }} VNĐ
            @endif
            </span>
        <span style="font-weight: 700">(Tổng tiền chưa bao gồm phí ship)</span>
    </td>
    <tr>
        <td style="background-color: #1782f1;color: white">THÔNG TIN NGƯỜI MUA</td>
        <td style="color: black">
            <div>Tên khách hàng: {{ @$data['name'] }}</div>
            <div>Điện thoại liên hệ: {{ @$data['phone'] }}</div>
            <div>Email đặt hàng: {{ @$data['email'] }}</div>
            <div>Hình thức thanh toán: chuyển hàng đến tận nơi và thu tiền</div>
            <div>Ghi chú của khách hàng: {{ @$data['note'] }}</div>
            <div>Địa chỉ nhận hàng: {{ @$data['address'] }}</div>
        </td>
    </tr>

    </tbody>
</table>
<div class="row" style="color: black;width: 50%">
    <div class="col-sm-6" style="float: left">
        <div>Tên shop</div>
        <div>Địa chỉ shop</div>
    </div>
    <div class="col-sm-6" style="float: right">
        <div>Hotline:</div>
        <div>Email:</div>
        <div>Website:</div>
    </div>
</div>
<br>
<br>
<div>( Không trả lời lại email này - Đây là email tự động của shop )</div>
</body>
</html>
