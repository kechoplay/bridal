@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hóa đơn chi tiết</h1>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" id="status">
                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa xử lý</option>
                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Hủy đơn hàng</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary col-md-2" onclick="changeStatus()">Trạng thái đơn hàng</button>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" id="status_payment">
                            <option value="0" {{ $order->status_payment == 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                            <option value="1" {{ $order->status_payment == 1 ? 'selected' : '' }}>Đã thanh toán</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary col-md-2" onclick="changeStatusPayment()">Trạng thái thanh toán</button>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <input type="hidden" value="{{ $order->id }}" id="order_id">
                                Tên khách hàng : <span><strong>{{ $order->name }}</strong></span><br>
                                Địa chỉ : <span><strong>{{ $order->address }}</strong></span><br>
                                Điện thoại : <span><strong>{{ $order->mobile }}</strong></span><br>
                                Email : <span><strong>{{ $order->email }}</strong></span><br>
                                Phương thức ship : <span><strong>{{ $order->shippingMethod ? $order->shippingMethod->ship_name_en : '' }}</strong></span><br>
                                Ngày cưới: <span><strong>{{ $order->wedding_date }}</strong></span><br>
                                Ngày chuyển hàng: <input type="date" id="send_date" name="send_date" value="{{ $order->send_date }}">
                                Mã vận đơn: <input type="text" id="code" name="code" value="{{ $order->code }}">
                                <button class="btn btn-primary col-md-2" onclick="saveDate()">Lưu</button>
                                <style type="text/css">
                                    th, td {
                                        border: 1px thin black;
                                        padding: 5px;
                                    }
                                </style>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên mặt hàng</th>
                                        <th>Ảnh</th>
                                        <th>Size</th>
                                        <th>Màu vải</th>
                                        <th>Màu hoa</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetail as $value)
                                        <tr>
                                            <td>{{ $value->product->name_en }}</td>
                                            <td><img src="{{ $value->product->img }}" style="width: 100px"></td>
                                            <td>{{ $value->size }}</td>
                                            <td>{{ $value->color1 }}</td>
                                            <td>{{ $value->color2 }}</td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>{{ number_format($value->price) }}</td>
                                            <td>{{ number_format($value->quantity * $value->price) }}</td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">Tổng tiền</td>
                                        <td>{{ number_format($total) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script>
        function changeStatus() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/order/detail/change-status/',
                method: 'post',
                data: {
                    status: $('#status').val(),
                    id: $('#order_id').val()
                },
                success: function (data) {
                    window.location.reload()
                }

            })
        }

        function changeStatusPayment() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/order/detail/change-status/',
                method: 'post',
                data: {
                    status_payment: $('#status_payment').val(),
                    id: $('#order_id').val()
                },
                success: function (data) {
                    window.location.reload()
                }

            })
        }

        function saveDate() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/order/detail/save-data',
                method: 'post',
                data: {
                    id: $('#order_id').val(),
                    send_date: $('#send_date').val(),
                    code: $('#code').val()
                },
                success: function (data) {
                    window.location.reload()
                }

            })
        }
    </script>
@endpush
