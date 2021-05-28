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
                            <form method="post" action="{{ route('admin.updateBridal', ['id' => $dress->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên váy</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $dress->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Ảnh</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="image" name="images[]" multiple>
                                            </div>
                                        </div>
                                        <label for="image">Ảnh cũ</label>
                                        <div>
                                            @foreach(@$dress->img_path as $img)
                                                <img src="{{ $img }}" style="max-width: 100px;">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mẫu váy</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}" {{ ($style->id == $dress->category_id) ? 'selected' : '' }}>{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Phân loại</label>
                                        <select name="status" class="form-control">
                                            <option value="0" @if($dress->status == 0) selected @endif>Thường</option>
                                            <option value="1" @if($dress->status == 1) selected @endif>Sản phẩm bán chạy</option>
                                            <option value="2" @if($dress->status == 2) selected @endif>Sản phẩm đặc biệt</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Miêu tả</label>
                                        <textarea class="form-control" id="description" name="description">{{ $dress->description }}</textarea>
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
