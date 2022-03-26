@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sản phẩm</h1>
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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Giá</th>
                                        <th>Màu váy</th>
                                        <th>Màu hoa</th>
                                        <th>Kích cỡ</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dress as $dr)
                                        <tr>
                                            <td>{{ $dr->name_en }}</td>
                                            <td>
                                                <img src="{{ $dr->image }}" style="max-width: 100px;">
                                            </td>
                                            <td>
                                                {{ $dr->weddingDressCategory->name }}
                                            </td>
                                            <td>
                                                {{ number_format($dr->price_en) }}
                                            </td>
                                            <td>
                                                {{ $dr->color1 }}
                                            </td>
                                            <td>
                                                {{ $dr->color2 }}
                                            </td>
                                            <td>
                                                {{ $dr->size }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.deleteBridal', ['id' => $dr->id]) }}">
                                                    <button class="btn btn-danger">Xóa</button>
                                                </a>
                                                <a href="{{ route('admin.editBridal', ['id' => $dr->id]) }}">
                                                    <button class="btn btn-secondary">Sửa</button>
                                                </a>
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
