@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kích thước</h1>
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
                                <h3 class="card-title">Danh sách kích thước</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Kích thước</th>
                                        <th style="width: 30%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sizes as $size)
                                        <tr>
                                            <td>{{ $size->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.deleteSize', ['id' => $size->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <button class="btn btn-secondary" onclick="setupEdit({{ $size }})">Sửa</button>
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
                            <form action="{{ route('admin.saveNewSize') }}" method="post" id="form-size">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_size" id="id_size">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kích thước</label>
                                        <input type="text" class="form-control" id="size_name" name="size_name">
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
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
            });
        });

        function setupEdit(size) {
            $('#id_size').val(size.id);
            $('#size_name').val(size.name);
            $('#create_btn').addClass('hidden')
            $('#edit_btn').removeClass('hidden')
            $('#cancel_btn').removeClass('hidden')
            $('#form-size').attr('action', '/admin/sizes/' + size.id);
        }

        function cancelEdit() {
            $('#id_size').val('');
            $('#size_name').val('');
            $('#create_btn').removeClass('hidden')
            $('#edit_btn').addClass('hidden')
            $('#cancel_btn').addClass('hidden')
            $('#form-size').attr('action', '/admin/sizes/');
        }
    </script>
@endpush
