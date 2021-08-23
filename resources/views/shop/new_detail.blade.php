@extends('shop.app')
@section('content')
    <div id="shopify-section-product-template" class="shopify-section">
        <div id="ProductSection-6694898139324" class="product-section" data-section-id="6694898139324"
             data-section-type="product" data-product-handle="theia-maika-cascading-ruffle-dress-white"
             data-product-title="Maika Cascading Ruffle Dress"
             data-product-url="/collections/shop/products/theia-maika-cascading-ruffle-dress-white"
             data-aspect-ratio="150.0"
             data-img-url="//cdn.shopify.com/s/files/1/0546/6033/products/8814954_2295_1_{width}x.jpg?v=1620055699"
             data-image-zoom="true" data-inventory="true" data-history="true" data-modal="false">
            <style>
                .shopify-payment-button__button--unbranded:hover:not([disabled]) {
                    background-color: #40423d;
                }

                .shopify-payment-button__button--unbranded {
                    background-color: black;
                }
            </style>
            <div class="page-content page-content--product">
                <div class="page-width">
                    <div class="row" style="width: 80% ; margin:auto">
                        <div class="text-center">
                            <h1 class="section-header__title" data-open-accessibility-text-original="29px" style="font-size: 29px;">
                                {{ $new->title }}
                            </h1>
                        </div>
                        <div class="box ">
                            <div class="box">
                                {!! $new->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shopify-section-product-story-sections" class="shopify-section">
            <div class="page-blocks"></div>
        </div>
        <script type='text/javascript' src='/js/jquery-migrate.min.js' id='jquery-migrate-js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function BuyNow() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id_now = $('#id_dress').val();
                var name = $('#name_dress').val();
                var price = $('#price_dress').val();
                var image = $('#image_dress').val();
                var slug = $('#slug_dress').val();
                $.ajax({
                    url: '/shop/ajax-buy-now',
                    type: 'post',
                    data: {id_now: id_now, name: name, price: price, image: image, slug: slug},
                    success: function (data) {
                        window.location.href = '/shop/cart-info';
                    }, error: function (e) {
                        console.log('Lỗi! mua ngay');
                    }
                })
            }

            function AddCart() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id_dress = $('#id_dress').val();
                var name = $('#name_dress').val();
                var price = $('#price_dress').val();
                var image = $('#image_dress').val();
                var slug = $('#slug_dress').val();
                $.ajax({
                    url: '/shop/add-cart',
                    type: 'post',
                    data: {id: id_dress, name: name, price: price, image: image, slug: slug},
                    success: function (data) {
                        $('#alert-add-cart').text('Đã thêm sản phẩm vào giỏ hàng');
                        setTimeout(function () {
                            $('#alert-add-cart').text('');
                        }, 2000);
                    }, error: function (e) {
                        console.log('Lỗi! Thêm sản phẩm thất bại');
                    }
                })
            }
        </script>

        @endsection

        @push('js')
            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "sort": false,
                        'filter': false,
                        'border-bottom': 0,
                        'border-spacing': 0
                    });
                });
            </script>
    @endpush
