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
                                    <span class="product__price-wrap-4464780836919"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        <span id="ComparePrice-4464780836919"
                                              class="product__price product__price--compare"
                                              data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                            {{ __(':priceVNĐ', ['price' => @number_format($dress->price)]) }}
                                        </span>
                                    </span>
                                    <span id="ComparePriceA11y-4464780836919" class="visually-hidden"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">Sale price</span>
                                    <span id="ProductPrice-4464780836919" class="product__price on-sale"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        {{ __(':priceVNĐ', ['price' => @number_format($dress->sale_price)]) }}
                                    </span>
                                    <span id="ProductPrice-4464780836919" class="product__price on-sale"
                                          data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        ({{ __('giảm :price', ['price' => $dress->discount . '%']) }})
                                    </span>
                                @else
                                    <span id="PriceA11y-6694898139324" class="visually-hidden">Regular price</span>
                                    <span id="ProductPrice-6694898139324" class="product__price">
                                    {{ __(':priceVNĐ', ['price' => @number_format($dress->price)]) }}
                                    </span>
                                @endif
                                <div
                                    class="product__unit-price product__unit-price--spacing product__unit-price-wrapper--6694898139324 hide">
                                    <span class="product__unit-price--6694898139324"></span>/<span
                                        class="product__unit-base--6694898139324"></span>
                                </div>
                                <hr class="hr--medium">
                                <form method="post" action="/cart/add" id="AddToCartForm-7088243146940"
                                      accept-charset="UTF-8" class="product-single__form" enctype="multipart/form-data">
                                    <input type="hidden" name="form_type" value="product">
                                    <input type="hidden" name="utf  8" value="✓">
                                    <div class="variant-wrapper variant-wrapper--button js">
                                        <label class="variant__label" for="ProductSelect-7088243146940-option-0">
                                            {{ __('Size') }}
                                        </label>
                                        <fieldset class="variant-input-wrap" name="Size" data-index="option1"
                                                  data-handle="size" id="ProductSelect-7088243146940-option-0">
                                            <legend class="hide">Size</legend>
                                            @if($dress->size)
                                                @foreach($dress->size as $key => $size)
                                                    <div class="variant-input" data-index="option1" data-value="0">
                                                        <input type="radio" value="{{ $size->name }}" checked="checked"
                                                               name="size" class="variant__input-7088243146940"
                                                               id="ProductSelect-7088243146940-option-size-{{ $key }}">
                                                        <label for="ProductSelect-7088243146940-option-size-{{ $key }}"
                                                               class="variant__button-label">{{ $size->name }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="variant-wrapper variant-wrapper--button js">
                                        <label class="variant__label" for="ProductSelect-7088243146940-option-1">
                                            {{ __('Màu vải') }}
                                        </label>
                                        <fieldset class="variant-input-wrap" name="Color" data-index="option2"
                                                  data-handle="color" id="ProductSelect-7088243146940-option-1">
                                            <legend class="hide">Color</legend>
                                            @if($dress->color1)
                                                @foreach($dress->color1 as $key => $color)
                                                    <div class="variant-input" data-value="{{ $color->code }}">
                                                        <input type="radio" checked="checked" value="{{ $color->code }}"
                                                               name="color1"
                                                               class="variant__input-7088243146940"
                                                               id="ProductSelect-7088243146940-option-color-{{ $color->code }}">
                                                        <label
                                                            for="ProductSelect-7088243146940-option-color-{{ $color->code }}"
                                                            style="background-color: {{ $color->code }}"
                                                            class="variant__button-label"></label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="variant-wrapper variant-wrapper--button js">
                                        <label class="variant__label" for="ProductSelect-7088243146940-option-1">
                                            {{ __('Màu hoa') }}
                                        </label>
                                        <fieldset class="variant-input-wrap" name="Color" data-index="option2"
                                                  data-handle="color" id="ProductSelect-7088243146940-option-1">
                                            <legend class="hide">Color</legend>
                                            @if($dress->color2)
                                                @foreach($dress->color2 as $key => $color)
                                                    <div class="variant-input" data-value="{{ $color->code }}">
                                                        <input type="radio" checked="checked" value="{{ $color->code }}"
                                                               name="color2"
                                                               class="variant__input-7088243146940"
                                                               id="ProductSelect-7088243146940-option-color-{{ $color->code }}">
                                                        <label
                                                            for="ProductSelect-7088243146940-option-color-{{ $color->code }}"
                                                            style="background-color: {{ $color->code }}"
                                                            class="variant__button-label"></label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </fieldset>
                                    </div>
                                </form>
                                <div style="margin-bottom: 10px;margin-top: 10%">
                                    <span id="alert-add-cart" style="color: green;text-align: center"></span>
                                </div>
                                <div class="payment-buttons">
                                    <button name="add" id="addCart" class="btn btn--full btn--secondary"
                                            onclick="AddCart()"
                                            style="margin-bottom: 5px;background-color: #0d0a0a;color: white">
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
                                    <p data-open-accessibility-text-original="16px" data-mce-fragment="1">
                                        <b data-mce-fragment="1">{{ __('Product details') }}</b>
                                    </p>
                                    {!! $dress->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </div>

            <div class="col-12 " style="padding-left:20px">
                {{ __('Nhận xét') }} <br><br>

                <br>
                <div class="box" style="width: 85%; margin:auto">
                    {{--                    @if(!empty(auth()->guard('customers')->user()->name))--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div>--}}
                    {{--                              <span style="display: inline-block;--}}
                    {{--                                                                                            margin-right: 10px;--}}
                    {{--                                                                                            background: rgb(255, 255, 255);--}}
                    {{--                                                                                            border: 1px solid rgb(24, 158, 255);--}}
                    {{--                                                                                            font-size: 12px;--}}
                    {{--                                                                                            color: rgb(24, 158, 255);--}}
                    {{--                                                                                            padding: 5px 15px;--}}
                    {{--                                                                                            border-radius: 4px;--}}
                    {{--                                                                                            cursor: pointer;"--}}
                    {{--                              >--}}
                    {{--                         Viết nhận xét--}}
                    {{--                        </span>--}}
                    {{--                            </div>--}}
                    {{--                            <br>--}}
                    {{--                            <div class="col-12">--}}
                    {{--                                <br>--}}
                    {{--                                <form action="{{ route('sendFeedback') }}" method="post" enctype="multipart/form-data"--}}
                    {{--                                      style="border: 1px solid #ddd; border-radius: 5px">--}}
                    {{--                                    {{ csrf_field() }}--}}
                    {{--                                    <div class="modal-header">--}}
                    {{--                                        <div class="write-review__product">--}}
                    {{--                                            <h4 style="    color: rgb(120, 120, 120);    font-weight: 400;"> Chia sẻ về--}}
                    {{--                                                sản phẩm :</h4>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-body">--}}
                    {{--                          <textarea id="content" style=" border: 1px solid rgb(238, 238, 238);--}}
                    {{--                                    padding: 12px;--}}
                    {{--                                    border-radius: 4px;--}}
                    {{--                                    resize: none;--}}
                    {{--                                    width: 100%;--}}
                    {{--                                    outline: 0px;--}}
                    {{--                                    margin: 24px 0px 12px;" name="msg_content"--}}
                    {{--                                    rows="4" placeholder="Chia sẻ thêm thông tin sản phẩm"--}}
                    {{--                                    class="write-review__input"></textarea>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-footer">--}}
                    {{--                                        <div class="write-review__buttons" style="width: 100%; flex: 1 1 0%;--}}
                    {{--                        align-items: flex-end;--}}
                    {{--                        display: flex;--}}
                    {{--                        -webkit-box-pack: justify;--}}
                    {{--                        justify-content: space-between;--}}
                    {{--                        padding: 0px 0px 16px;--}}
                    {{--                        margin: 12px 0px 0px;">--}}
                    {{--                                            <input id="input-image" class="write-review__file"--}}
                    {{--                                                   accept="image/png, image/gif, image/jpeg" name="images[]" hidden--}}
                    {{--                                                   type="file"--}}
                    {{--                                                   multiple>--}}
                    {{--                                            <input type="text" hidden value="{{$dress->id}}" name="id">--}}
                    {{--                                            <button style="  color: rgb(11, 116, 229);--}}
                    {{--                                    width: 49%;--}}
                    {{--                                    height: 36px;--}}
                    {{--                                    background: 0px center;--}}
                    {{--                                    padding: 0px;--}}
                    {{--                                    line-height: 36px;--}}
                    {{--                                    cursor: pointer;--}}
                    {{--                                    border-radius: 4px;--}}
                    {{--                                    display: flex;--}}
                    {{--                                    -webkit-box-pack: center;--}}
                    {{--                                    justify-content: center;--}}
                    {{--                                    -webkit-box-align: center;--}}
                    {{--                                    align-items: center;--}}
                    {{--                                    outline: 0px;--}}
                    {{--                                    border: 1px solid rgb(11, 116, 229);"--}}
                    {{--                                                    type="button"--}}
                    {{--                                                    class="write-review__button write-review__button--image"--}}
                    {{--                                                    id="add-image"--}}
                    {{--                                            >--}}
                    {{--                                                <i class="fa fa-photo-video"></i>--}}
                    {{--                                                <span>Thêm ảnh</span>--}}
                    {{--                                            </button>--}}
                    {{--                                            <button style="  color: rgb(11, 116, 229);--}}
                    {{--                                    width: 49%;--}}
                    {{--                                    height: 36px;--}}
                    {{--                                    background: 0px center;--}}
                    {{--                                    padding: 0px;--}}
                    {{--                                    line-height: 36px;--}}
                    {{--                                    cursor: pointer;--}}
                    {{--                                    border-radius: 4px;--}}
                    {{--                                    display: flex;--}}
                    {{--                                    -webkit-box-pack: center;--}}
                    {{--                                    justify-content: center;--}}
                    {{--                                    -webkit-box-align: center;--}}
                    {{--                                    align-items: center;--}}
                    {{--                                    outline: 0px;--}}
                    {{--                                    border: 1px solid rgb(11, 116, 229);" id="send"--}}
                    {{--                                                    type="submit"--}}
                    {{--                                                    class="write-review__button write-review__button--submit"><span>Gửi đánh giá</span>--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                    <br>
                    <table id="example1" class="table borderless">
                        <tbody>
                        @foreach($feedBacks as $item)
                            <tr>
                                <td>
                                    <span style="text-transform: capitalize">
                                    <b> <i class=" fa-user"></i> {{$item->name}}</b>
                                    </span><br>

                                    @if( count($item->list_image) >0 )
                                        @foreach($item->list_image as $value)
                                            <img style="width: 150px; " src="{{$value}}" alt="">
                                        @endforeach
                                    @endif
                                    <br>
                                    <span> Trích dẫn - " <i>{{$item->content}}</i>"</span>
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
        <div class="modal  fade bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">

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
                var size = $('input[name=size]:checked').val();
                var color1 = $('input[name=color1]:checked').val();
                var color2 = $('input[name=color2]:checked').val();
                $.ajax({
                    url: '/shop/add-cart',
                    type: 'post',
                    data: {
                        id: id_dress,
                        name: name,
                        price: price,
                        image: image,
                        slug: slug,
                        size: size,
                        color1: color1,
                        color2: color2
                    },
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
                $(document).on('click', '#add-image', function () {
                    $('#input-image').trigger('click');
                });

            </script>
    @endpush
