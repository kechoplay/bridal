@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ảnh banner</h1>
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
                                <a href="{{ route('admin.addBanner') }}"><button class="btn btn-primary" style="margin-bottom: 10px;">Thêm ảnh</button></a>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td>{{ $banner->title }}</td>
                                            <td>
                                                <img src="{{ $banner->path }}" style="max-width: 100px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.deleteBridal', ['id' => $banner->id]) }}">
                                                    <button class="btn btn-danger">Xóa</button>
                                                </a>
                                                <a href="{{ route('admin.editBanner', ['id' => $banner->id]) }}">
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
@endpush
