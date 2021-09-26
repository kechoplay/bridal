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
                    <div class="grid grid--product-images--partial">
                        <div class="grid__item medium-up--one-half product-single__sticky">
                            <div data-product-images data-zoom="true" data-has-slideshow="true">
                                <div class="product__photos product__photos-6694898139324 product__photos--beside">

                                    <div class="product__main-photos" data-aos data-product-single-media-group>
                                        <div id="ProductPhotos-6694898139324" class="product-slideshow">
                                            @foreach($dress->img_path as $img)
                                                <div class="product-main-slide starting-slide" data-index="0">
                                                    <div class="product-image-main product-image-main--6694898139324">
                                                        <div class="image-wrap"
                                                             style="height: 0; padding-bottom: 150.0%;">
                                                            <img class="photoswipe__image lazyload"
                                                                 data-photoswipe-src="{{ $img }}"
                                                                 data-photoswipe-width="1200"
                                                                 data-photoswipe-height="1800"
                                                                 data-index="1"
                                                                 data-src="{{ $img }}"
                                                                 data-aspectratio="0.6666666666666666" data-sizes="auto"
                                                                 alt="Maika Cascading Ruffle Dress">
                                                            <button type="button"
                                                                    class="btn btn--body btn--circle js-photoswipe__zoom product__photo-zoom">
                                                                <svg aria-hidden="true" focusable="false"
                                                                     role="presentation" class="icon icon-search"
                                                                     viewBox="0 0 64 64">
                                                                    <path
                                                                        d="M47.16 28.58A18.58 18.58 0 1 1 28.58 10a18.58 18.58 0 0 1 18.58 18.58zM54 54L41.94 42"/>
                                                                </svg>
                                                                <span class="icon__fallback-text">Close (esc)</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div id="ProductThumbs-6694898139324"
                                         class="product__thumbs product__thumbs--beside product__thumbs-placement--left small--hide"
                                         data-position="beside" data-arrows="false" data-aos>
                                        <div class="product__thumbs--scroller">
                                            @foreach($dress->img_path as $img)
                                                <div class="product__thumb-item" data-index="0">
                                                    <div class="image-wrap" style="height: 0; padding-bottom: 150.0%;">
                                                        <a href="{{ $img }}"
                                                           class="product__thumb product__thumb-6694898139324"
                                                           data-index="0" data-id="20987894694076">
                                                            <img class="animation-delay-3 lazyload"
                                                                 data-src="{{ $img }}"
                                                                 data-widths="[120, 360, 540, 720]"
                                                                 data-aspectratio="0.6666666666666666" data-sizes="auto"
                                                                 alt="Maika Cascading Ruffle Dress">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__item medium-up--one-half">
                            <div class="product-single__meta">
                                <h1 class="h2 product-single__title">{{ $dress->name }}</h1>
                                @if($dress->sale_price > 0)
                                    <span id="PriceA11y-6694898139324" class="visually-hidden">Regular price</span>
                                    <span class="product__price-wrap-4464780836919"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        <span id="ComparePrice-4464780836919"
                                              class="product__price product__price--compare"
                                              data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                            {{ __('VNĐ') . number_format($dress->price) }}
                                        </span>
                                    </span>
                                    <span id="ComparePriceA11y-4464780836919" class="visually-hidden"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">Sale price</span>
                                    <span id="ProductPrice-4464780836919" class="product__price on-sale"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        {{ __('VNĐ') . number_format($dress->sale_price) }}
                                    </span>
                                @else
                                    <span id="PriceA11y-6694898139324" class="visually-hidden">Regular price</span>
                                    <span id="ProductPrice-6694898139324" class="product__price">
                                    {{ __('VNĐ') . number_format($dress->price) }}
                                    </span>
                                @endif
                                <div
                                    class="product__unit-price product__unit-price--spacing product__unit-price-wrapper--6694898139324 hide">
                                    <span class="product__unit-price--6694898139324"></span>/<span
                                        class="product__unit-base--6694898139324"></span>
                                </div>
                                <div style="margin-bottom: 10px;margin-top: 20%">
                                    <span id="alert-add-cart" style="color: green;text-align: center"></span>
                                </div>
                                <div class="payment-buttons">
                                    <button name="add" id="addCart" class="btn btn--full btn--secondary"
                                            onclick="AddCart()" style="margin-bottom: 5px;background-color: #0d0a0a;color: white">
                                        <span id="addToCart">{{ __('Thêm vào giỏ hàng') }}</span>
                                    </button>
                                    <div data-shopify="payment-button" class="shopify-payment-button">
                                        <button
                                            class="shopify-payment-button__button shopify-payment-button__button--unbranded shopify-payment-button__button--hidden"
                                            disabled="disabled" aria-hidden="true"></button>
                                        <button
                                            class="shopify-payment-button__more-options shopify-payment-button__button--hidden"
                                            disabled="disabled" aria-hidden="true"></button>
                                    </div>
                                </div>
                                <div class="product-single__description rte">
                                    {!! $dress->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </div>

            <div class="col-12 " style="padding-left:20px">
                ĐÁNH GIÁ - NHẬN XÉT TỪ KHÁCH HÀNG <br><br>
                <div class="box" style="width: 85%; margin:auto">
                    <table id="example1" class="table borderless">
                        <tbody>
                        @foreach($feedBacks as $item)
                            <tr>
                                <td>
                                    <span style="text-transform: capitalize">
                                    <b> <i class=" fa-user"></i> {{$item->name}}</b>
                                    </span><br>
                                    <p> {{$item->content}}</p>
                                    @if( count($item->list_image) >0 )
                                        @foreach($item->list_image as $value)
                                            <img style="width: 150px; " src="{{$value}}" alt="">
                                        @endforeach
                                    @endif
                                    <br>
                                    <span style="color: rgb(120, 120, 120);"> Nhận xét vào ngày : {{$item->time}}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="shopify-section-product-story-sections" class="shopify-section">
            <div class="page-blocks"></div>
        </div>
        <input type="hidden" value="{{ @$dress->id }}" id="id_dress">
        <input type="hidden" value="{{ @$dress->name }}" id="name_dress">
        @if($dress->sale_price >0)
            <input type="hidden" value="{{ @$dress->sale_price }}" id="price_dress">
        @endif
        @if($dress->sale_price == 0)
            <input type="hidden" value="{{ @$dress->price }}" id="price_dress">
        @endif
        <input type="hidden" value="{{ @$dress->img_path[0] }}" id="image_dress">
        <input type="hidden" value="{{ @$dress->slug }}" id="slug_dress">
        {{--    <script type='text/javascript' src='/js/jquery.min.js' id='jquery-core-js'></script>--}}
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
