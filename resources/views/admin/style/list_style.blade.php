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
                                        <th>Tên</th>
                                        <th>Ảnh danh mục</th>
                                        <th>Danh sách sản phẩm</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($styles as $style)
                                        <tr>
                                            <td>{{ $style->name }}</td>
                                            <td><img src="{{ $style->img_category }}" style="max-width: 100px;"></td>
                                            <td>
                                                <a href="{{ route('admin.index', ['dm' => $style->id]) }}" target="_blank">Danh sách sản phẩm</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.deleteStyle', ['id' => $style->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <a href="{{ route('admin.editStyle', ['id' => $style->id]) }}"><button class="btn btn-secondary">Sửa</button></a>
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
