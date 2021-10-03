@extends('layout.customers')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-transform: capitalize"> Đơn hàng của tôi </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Sản phẩm</th>
                                        <th>Ngày mua</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <a href="{{ route('order-view', ['id' => $product->id]) }}"> {{$product->id}}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('order-view', ['id' => $product->id]) }}">{{ $product->name}}</a>
                                            </td>
                                            <td>{{$product->order_date}}</td>
                                            <td>
                                                {{ number_format($product->price * $product->quantity) }} ₫
                                            </td>
                                            <td class="text-right" style="text-transform: capitalize;">
                                                @switch($product->status)
                                                    @case(0)
                                                    <span style="">Chưa xử lý</span>
                                                    @break
                                                    @case(1)
                                                    <span style="color: greenyellow">Đang xử lý</span>
                                                    @break
                                                    @case(2)
                                                    <span style="  color: green">Hoàn thành</span>
                                                    @break
                                                    @case(3)
                                                    <span style="  color: green">Hủy đơn hàng</span>
                                                    @break
                                                @endswitch
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
        </section>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "sort": false,
                'filter': false
            });
        });
    </script>
@endpush
