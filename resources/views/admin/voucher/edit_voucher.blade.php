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
                            <form method="post" action="{{ route('admin.updateVoucher', ['id' => $voucher->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Mã voucher</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{$voucher->code}}" required style="width: 40%">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="discount">% giảm(trên tổng hóa đơn)</label>
                                        <input type="number" class="form-control" id="discount" name="discount"  required style="width: 10%" value="{{$voucher->discount}}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="start_time">Thời gian bắt đầu</label>
                                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $startTime }}"  required style="width: 40%">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="end_time">Ngày kết thúc(đến 24h trong ngày)</label>
                                        <input type="date" class="form-control" id="end_time" name="end_time" value="{{date('Y-m-d', strtotime($voucher->end_time))}}"  required style="width: 40%">
                                    </div>
                                </div>

                                <!-- /.card-body -->

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
