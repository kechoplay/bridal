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
                            <form method="post" action="{{ route('admin.saveBridal') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá($)</label>
                                        <input type="number" class="form-control" style="width: 18%" id="price_en" name="price_en" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Ảnh</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="image" name="images[]" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Danh mục</label>
                                        <select name="style" class="form-control">
                                            @foreach($styles as $style)
                                                <option value="{{ $style->id }}">{{ $style->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Kích cỡ</label>
                                        <select name="size[]" class="form-control size" required multiple="multiple" style="width: 100%;">
                                            @foreach($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Màu vải</label>
                                        <select name="color1[]" class="form-control color1" required multiple="multiple" style="width: 100%;">
                                            @foreach($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name_vi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Màu hoa</label>
                                        <select name="color2[]" class="form-control color2" required multiple="multiple" style="width: 100%;">
                                            @foreach($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Thời gian xử lý</label>
                                        <input type="text" class="form-control" style="width: 18%" id="process_time" name="process_time">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Miêu tả</label>
                                        <textarea class="form-control" id="description_en" name="description_en"></textarea>
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
        $('#description_en').summernote({
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
        $('#process_time').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'DD/MM/YYYY'
            }
        })
        $('.size').select2()
        $('.color1').select2()
        $('.color2').select2()
    </script>
@endpush
