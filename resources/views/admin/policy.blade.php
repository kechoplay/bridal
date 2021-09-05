@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Điều khoản</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.savePolicy') }}" method="post" class="row">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><label>Follow us</label></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input class="form-control" type="text" name="facebook" value="{{ isset($policy->facebook) ? $policy->facebook : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="instagram" value="{{ isset($policy->instagram) ? $policy->instagram : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input class="form-control" type="text" name="website" value="{{ isset($policy->website) ? $policy->website : '' }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><label>Giới thiệu</label></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="introduce"
                                              name="introduce">{{ isset($policy->introduce) ? $policy->introduce : '' }}</textarea>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><label>Điều khoản</label></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="policy"
                                              name="policy">{{ isset($policy->privacy_policy) ? $policy->privacy_policy : '' }}</textarea>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Chính sách</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <textarea id="term"
                                              name="term">{{ isset($policy->term_of_service) ? $policy->term_of_service : '' }}</textarea>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12 text-center">
                            <button class="form-control text-center btn btn-primary" style="width: 100px" type="submit">
                                Lưu
                            </button>
                        </div>
                    </form>
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
            // Summernote
            $('#policy').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
            $('#term').summernote({
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
            $('#introduce').summernote({
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
        })
    </script>
@endpush
