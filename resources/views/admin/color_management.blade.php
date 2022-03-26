@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Màu sắc</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title">Danh sách màu sắc</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tên màu</th>
                                        <th></th>
                                        <th style="width: 30%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($colors as $color)
                                        <tr>
                                            <td>{{ $color->name_en }}</td>
                                            <td>
                                                <div class="sp-colorize" style="background-color: {{ $color->code }}; width: 30px; height: 30px"></div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.deleteColor', ['id' => $color->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <button class="btn btn-secondary" onclick="setupEdit({{ $color }})">Sửa</button>
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
                    <div class="col-6">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h3 class="card-title">Chức năng</h3>
                            </div>
                            <form action="{{ route('admin.saveNewColor') }}" method="post" id="form-color">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_color" id="id_color">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên màu</label>
                                        <input type="text" id="color_name_en" name="color_name_en">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Màu</label>
                                        <input id="colorpicker" name="color_code">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="create_btn">Thêm mới</button>
                                    <button type="submit" class="btn btn-primary hidden" id="edit_btn">Sửa</button>
                                    <button type="button" class="btn btn-primary hidden" id="cancel_btn" onclick="cancelEdit()">Hủy</button>
                                </div>
                            </form>
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
        $("#colorpicker").spectrum({
            color: "#f00"
        });

        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
            });
        });

        function setupEdit(color) {
            $('#id_color').val(color.id);
            $('#color_name_vi').val(color.name_vi);
            $('#color_name_en').val(color.name_en);
            $('#create_btn').addClass('hidden')
            $('#edit_btn').removeClass('hidden')
            $('#cancel_btn').removeClass('hidden')
            $('#form-color').attr('action', '/admin/colors/' + color.id);
            $("#colorpicker").spectrum('set', color.code);
        }

        function cancelEdit() {
            $('#id_color').val('');
            $('#color_name_vi').val('');
            $('#color_name_en').val('');
            $('#create_btn').removeClass('hidden')
            $('#edit_btn').addClass('hidden')
            $('#cancel_btn').addClass('hidden')
            $('#form-color').attr('action', '/admin/colors/');
        }
    </script>
@endpush
