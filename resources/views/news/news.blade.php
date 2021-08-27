@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-transform: capitalize"> Danh sách thông tin </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as  $key => $new)
                                        <tr>
                                            <td>
                                                {{$key +1 }}
                                            </td>
                                            <td>
                                                <div class="box-title">
                                                    <span>
                                                       <b> Tiều đề :</b>
                                                    </span>
                                                    <br>
                                                    <span style="padding-left: 10px;"> {{$new->title_vi}}</span>
                                                </div>
                                                <div class="box-title" style="color: rgb(142, 142, 142);">
                                                    <span>
                                                       <b> Title :</b>
                                                    </span>
                                                    <br>
                                                    <span style="padding-left: 10px">  {{$new->title_en}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($new->status == 0 )
                                                    <span> Đợi đăng </span>
                                                @endif
                                                @if($new->status == 1 )
                                                    <span style="color: green"> Đã đăng </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "sort": false,
                'filter': false
            });
        });
    </script>
@endpush
