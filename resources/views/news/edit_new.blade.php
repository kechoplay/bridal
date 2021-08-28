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
                            <form method="post" action="{{ route('admin.updateNews', ['id' => $news->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" value="" name="idNew">
                                    <div class="form-group">
                                        <label for="name">Thêm ảnh / Add image</label> <br>
                                        <input type="file" class="" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tiêu đề VI</label>
                                        <input type="text" class="form-control" value="{{ $news->title_vi }}" id="name" name="title_vi" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">TTiêu đề EN</label>
                                        <input type="text" class="form-control" value="{{ $news->title_en }}" id="name_en" name="title_en" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Nội dung VI</label>
                                        <textarea class="form-control" id="description" name="description_vi">{{ $news->description_vi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Nội dung EN</label>
                                        <textarea class="form-control" id="description_en" name="description_en">{{ $news->description_en }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"> Lưu thông tin </button>
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
    </script>
@endpush
