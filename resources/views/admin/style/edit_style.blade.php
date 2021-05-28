@extends('layout.admin.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="{{ route('admin.updateStyle', ['id' => $style->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên mẫu</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $style->name }}" required>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <label for="name">Ảnh cũ</label>
                                    <div class="form-group">
                                        <img src="{{ $style->img_category }}" style="max-width: 100px;">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
