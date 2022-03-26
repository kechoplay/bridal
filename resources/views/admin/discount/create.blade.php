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
                            <form method="post" action="{{ route('admin.saveNewDiscount') }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ isset($discount) ? $discount->id : 0 }}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Tên giảm giá</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                               value="{{ isset($discount) ? $discount->name_en : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Thời gian bắt đầu</label>
                                        <input type="date" class="form-control" style="width: 20%;" id="start_time"
                                               name="start_time"
                                               value="{{ isset($discount) ? $discount->start_time : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Thời gian kết thúc</label>
                                        <input type="date" class="form-control" style="width: 20%;" id="end_time"
                                               name="end_time" value="{{ isset($discount) ? $discount->end_time : '' }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Giảm giá (%)</label>
                                        <input type="number" class="form-control" style="width: 20%;" id="discount"
                                               name="discount" value="{{ isset($discount) ? $discount->discount : '' }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Danh sách sản phầm giảm giá</label>
                                        <select class="list-product" multiple="multiple" data-placeholder="Chọn sản phẩm"
                                                style="width: 100%;" name="list_product[]">
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" {{ (isset($discount) && in_array($product->id, $discount->product_list)) ? 'selected' : '' }}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mô tả</label>
                                        <textarea id="description_en"
                                                  name="description_en">{{ isset($discount) ? $discount->description_en : '' }}</textarea>
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
        $('#description_vi').summernote({
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

        $('.list-product').select2()
    </script>
@endpush
