@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="text-transform: capitalize"> List Feed back </h1>
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
                                <table id="example1" class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sản phẩm</th>
                                        <th>FeedBack</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedBacks as $key => $item)
                                        <tr>
                                            <td> {{$key +1}} </td>

                                            <td>
                                                <p> {{$item->content}}</p>
                                                @if( count($item->list_image) >0 )
                                                    @foreach($item->list_image as $value)
                                                        <img style="width: 80px; " src="{{$value}}" alt="">
                                                    @endforeach
                                                @endif
                                                <br>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteFeedback', ['id' => $item->id]) }}">
                                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </a>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "sort": false,
                'filter': false
            });
        });
    </script>
@endpush
