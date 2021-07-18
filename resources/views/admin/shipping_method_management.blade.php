@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chế độ ship</h1>
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
                                <h3 class="card-title">Danh sách ship</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tên ship VI</th>
                                        <th>Tên ship EN</th>
                                        <th>Thời gian ship VI</th>
                                        <th>Thời gian ship EN</th>
                                        <th>Giá ship VI</th>
                                        <th>Giá ship EN</th>
                                        <th style="width: 30%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shippingMethod as $item)
                                        <tr>
                                            <td>{{ $item->ship_name_vi }}</td>
                                            <td>{{ $item->ship_name_en }}</td>
                                            <td>{{ $item->ship_time_vi }}</td>
                                            <td>{{ $item->ship_time_en }}</td>
                                            <td>{{ $item->ship_fee_vi }}</td>
                                            <td>{{ $item->ship_fee_en }}</td>
                                            <td>
                                                <a href="{{ route('admin.deleteShippingMethod', ['id' => $item->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <button class="btn btn-secondary" onclick="setupEdit({{ $item }})">Sửa</button>
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

        function setupEdit(color) {
            $('#id_color').val(color.id);
            $('#color_name_vi').val(color.name_vi);
            $('#color_name_en').val(color.name_en);
            $("#colorpicker").spectrum('set', color.code);
        }
    </script>
@endpush
