@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chương trình giảm giá</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title">Danh sách giảm giá</h3>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('admin.createDiscount') }}"><button class="btn btn-primary" style="margin-bottom: 10px">Thêm chương trình giảm giá</button></a>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tên giảm giá</th>
                                        <th>Thời gian giảm giá</th>
                                        <th>Phần trăm giảm</th>
                                        <th>Số lượng sản phẩm</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($discounts as $discount)
                                        <tr>
                                            <td>{{ $discount->name_en }}</td>
                                            <td>{{ $discount->start_time . ' - ' .$discount->end_time }}</td>
                                            <td>{{ $discount->discount }} (%)</td>
                                            <td>{{ $discount->total_apply }}</td>
                                            <td>
                                                <a href="{{ route('admin.deleteDiscount', ['id' => $discount->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <a href="{{ route('admin.editDiscount', ['id' => $discount->id]) }}"><button class="btn btn-secondary">Sửa</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
            });
        });
    </script>
@endpush
