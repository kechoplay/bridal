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
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 20%;">Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as  $key => $new)
                                        <tr>
                                            <td>
                                                {{$key +1 }}
                                            </td>
                                            <td>
                                                <img src="{{ $new->img_path }}" style="width: 100%;">
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
                                                <a href="{{ route('admin.deleteNews', ['id' => $new->id]) }}"><button class="btn btn-danger">Xóa</button></a>
                                                <a href="{{ route('admin.editNews', ['id' => $new->id]) }}"><button class="btn btn-secondary">Sửa</button></a>
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
        import Jquery
        $(function () {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "sort": false,
                'filter': false
            });
        });
        export default {
            components: {Jquery}
        }
    </script>
@endpush
