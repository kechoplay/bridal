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
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $dress->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{ $dress->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá giảm</label>
                                        <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ $dress->sale_price }}" required>
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
                                        <label for="name">Danh mục</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}" {{ ($style->id == $dress->category_id) ? 'selected' : '' }}>{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Danh mục</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}" {{ ($style->id == $dress->category_id) ? 'selected' : '' }}>{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Màu vải</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}" {{ ($style->id == $dress->category_id) ? 'selected' : '' }}>{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Màu hoa</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}" {{ ($style->id == $dress->category_id) ? 'selected' : '' }}>{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Kích thước</label>
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

@push('js')
    <script>
        $('#description').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null
        });
    </script>
@endpush
