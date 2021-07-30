@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh mục</h1>
                    </div>
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
                                @if(session('errors'))
                                    <?php
                                    $error_alert = '';
                                    ?>
                                    @foreach(session('errors') as $error)
                                        <?php
                                        $error_alert .= $error . '\\n';
                                        ?>
                                    @endforeach
                                    @push('js')
                                        <script type="application/javascript">
                                            alert("{!! $error_alert !!}");
                                        </script>
                                    @endpush
                                @endif
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>% giảm</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Số người đã áp dụng</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($voucher as $voucher)
                                        <tr>
                                            <td>{{ $voucher['code'] }}</td>
                                            <td>{{ $voucher['discount'] }} %</td>
                                            <td>{{ date('H:i - d/m/Y', strtotime($voucher['start_time'])) }} </td>
                                            <td>{{ date('H:i - d/m/Y', strtotime($voucher['end_time'])) }} </td>
                                            <td>{{ $voucher['total_use'] }} </td>
                                            @if(strtotime($voucher['start_time'])>time())
                                            <td>Chưa mở </td>
                                            @endif
                                            @if(strtotime($voucher['start_time'])<time() && strtotime($voucher['end_time'])>time())
                                                <td>Đang mở </td>
                                            @endif
                                            @if($voucher['status'] == 1)
                                                <td>Hết hạn </td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.deleteVoucher', ['id' => $voucher['id']]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <a href="{{ route('admin.editVoucher', ['id' => $voucher['id']]) }}"><button class="btn btn-secondary">Sửa</button></a>
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
