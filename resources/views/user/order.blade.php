@extends('layout.admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 style="text-transform: capitalize">
                            Sản phẩm #{{$product->id}}
                        </h4>
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
                                <div class="row">


                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table borderless">
                                            <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Giảm giá</th>
                                                <th>Tạm tính</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <td>
                                                    <div class="product-item" style="width: 50%">
                                                        <img style="width: 200px; height: 200px ;border-radius: 5px;"
                                                             src="{{$product->image}}"
                                                             alt="{{$product->name}}">
                                                        <div class="product-info ">
                                                            <br>
                                                            <a class="product-name"
                                                               href="{{ route('shop.productDetails', ['nameProduct' => $product->slug]) }}"
                                                               target="_blank">
                                                                {{$product->name}}
                                                                <img alt="" class="cover-img">
                                                            </a>
                                                            <div class="product-review"><br>
                                                                <span style="display: inline-block;
                                                                    margin-right: 10px;
                                                                    background: rgb(255, 255, 255);
                                                                    border: 1px solid rgb(24, 158, 255);
                                                                    font-size: 12px;
                                                                    color: rgb(24, 158, 255);
                                                                    padding: 5px 15px;
                                                                    border-radius: 4px;
                                                                    cursor: pointer;"
                                                                      data-toggle="modal"
                                                                      data-target="#exampleModalCenter"
                                                                >
                                                                    Viết nhận xét
                                                                </span>
                                                                <a href="{{ route('shop.productDetails', ['nameProduct' => $product->slug]) }}"
                                                                   target="_blank">
                                                                    Mua lại
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="price">119.000 ₫</td>
                                                <td class="discount-amount">0 ₫</td>
                                                <td class="raw-total">119.000 ₫</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3"><span>Tạm tính</span></td>
                                                <td>119.000 ₫</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><span>Phí vận chuyển</span></td>
                                                <td>25.000 ₫</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><span>Tổng cộng</span></td>
                                                <td><span class="sum">144.000 ₫</span></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade  bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="write-review__product">
                        <h4 style="    color: rgb(120, 120, 120);    font-weight: 400;"> Chia sẻ về sản phẩm : </h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea style=" border: 1px solid rgb(238, 238, 238);
                                    padding: 12px;
                                    border-radius: 4px;
                                    resize: none;
                                    width: 100%;
                                    outline: 0px;
                                    margin: 24px 0px 12px;"
                              rows="8" placeholder="Chia sẻ thêm thông tin sản phẩm"
                              class="write-review__input"></textarea>
                </div>
                <div class="modal-footer">
                    <div class="write-review__buttons" style="width: 100%; flex: 1 1 0%;
                        align-items: flex-end;
                        display: flex;
                        -webkit-box-pack: justify;
                        justify-content: space-between;
                        padding: 0px 0px 16px;
                        margin: 12px 0px 0px;">
                        <input class="write-review__file" hidden type="file" multiple="">
                        <button style="  color: rgb(11, 116, 229);
                                    width: 49%;
                                    height: 36px;
                                    background: 0px center;
                                    padding: 0px;
                                    line-height: 36px;
                                    cursor: pointer;
                                    border-radius: 4px;
                                    display: flex;
                                    -webkit-box-pack: center;
                                    justify-content: center;
                                    -webkit-box-align: center;
                                    align-items: center;
                                    outline: 0px;
                                    border: 1px solid rgb(11, 116, 229);"
                                type="button" class="write-review__button write-review__button--image">
                            <i class="fa fa-photo-video"></i>
                            <span>Thêm ảnh</span>
                        </button>
                        <button style="  color: rgb(11, 116, 229);
                                    width: 49%;
                                    height: 36px;
                                    background: 0px center;
                                    padding: 0px;
                                    line-height: 36px;
                                    cursor: pointer;
                                    border-radius: 4px;
                                    display: flex;
                                    -webkit-box-pack: center;
                                    justify-content: center;
                                    -webkit-box-align: center;
                                    align-items: center;
                                    outline: 0px;
                                    border: 1px solid rgb(11, 116, 229);"
                                type="button" class="write-review__button write-review__button--submit"><span>Gửi đánh giá</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')

@endpush
@push('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "sort": false,
            });
        });
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>
@endpush
