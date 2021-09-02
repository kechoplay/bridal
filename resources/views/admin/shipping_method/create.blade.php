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
                            <form method="post" action="{{ route('admin.saveNewShippingMethod') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ isset($shipping) ? $shipping->id : 0 }}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên ship nội địa</label>
                                        <input type="text" class="form-control" id="ship_name_vi" name="ship_name_vi" value="{{ isset($shipping) ? $shipping->ship_name_vi : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Thời gian ship nội địa</label>
                                        <input type="text" class="form-control" id="ship_time_vi" name="ship_time_vi" value="{{ isset($shipping) ? $shipping->ship_time_vi : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá ship nội địa</label>
                                        <input type="number" class="form-control" id="ship_fee_vi" name="ship_fee_vi" value="{{ isset($shipping) ? $shipping->ship_fee_vi : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên ship nước ngoài</label>
                                        <input type="text" class="form-control" id="ship_name_en" name="ship_name_en" value="{{ isset($shipping) ? $shipping->ship_name_en : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Thời gian ship nước ngoài</label>
                                        <input type="text" class="form-control" id="ship_time_en" name="ship_time_en" value="{{ isset($shipping) ? $shipping->ship_time_en : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giá ship nước ngoài</label>
                                        <input type="number" step="0.01" class="form-control" id="ship_fee_en" name="ship_fee_en" value="{{ isset($shipping) ? $shipping->ship_fee_en : '' }}" required>
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
