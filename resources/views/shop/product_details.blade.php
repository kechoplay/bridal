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
{{--                                <div style="margin-bottom: 10.5px" class="product-single__vendor">Sustainable</div>--}}

                                <h1 class="h2 product-single__title">
                                    {{ @$dress->name }}
                                    <div style="margin-top: 10px">
                                    <span class="product__price-wrap-6236056355004" data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                     <span id="ComparePrice-6236056355004" class="product__price product__price--compare" data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                         {{ @number_format($dress->price) }} vnđ
                                     </span>
                                    </span>
                                    <span id="ProductPrice-6236056355004" class="product__price on-sale" data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                       {{ @number_format($dress->sale_price) }} vnđ
                                    </span>
                                    </div>
                                <div class="product__unit-price product__unit-price--spacing product__unit-price-wrapper--6694898139324 hide">
                                     <span class="product__unit-price--6694898139324"></span>/<span class="product__unit-base--6694898139324"></span>
                                </div>
                                <script>
                                    window.inventories = window.inventories || {};
                                    window.inventories['6694898139324'] = {};
                                </script>


{{--                                <hr class="hr--medium">--}}
{{--                                <form  action=""  accept-charset="UTF-8" class="product-single__form" enctype="multipart/form-data">--}}
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
{{--                                    <input type="hidden" name="form_type" value="product" /><input type="hidden" name="utf8" value="✓" />--}}
{{--                                    <div class="variant-wrapper variant-wrapper--button js">--}}
{{--                                        <label class="variant__label" for="ProductSelect-6694898139324-option-0">--}}
{{--                                            Size--}}
{{--                                        </label>--}}
{{--                                        <fieldset class="variant-input-wrap" name="Size" data-index="option1" data-handle="size" id="ProductSelect-6694898139324-option-0">--}}
{{--                                            <legend class="hide">Size</legend>--}}
{{--                                            <div class="variant-input" data-index="option1" data-value="0">--}}
{{--                                                <input type="radio" checked="checked" value="0" data-index="option1" name="Size" class="variant__input-6694898139324" id="ProductSelect-6694898139324-option-size-0"><label for="ProductSelect-6694898139324-option-size-0" class="variant__button-label">0</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="variant-input" data-index="option1" data-value="2">--}}
{{--                                                <input type="radio" value="2" data-index="option1" name="Size" class="variant__input-6694898139324" id="ProductSelect-6694898139324-option-size-2"><label for="ProductSelect-6694898139324-option-size-2" class="variant__button-label">2</label>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                    </div>--}}
{{--                                    <div class="variant-wrapper variant-wrapper--button js">--}}
{{--                                        <label class="variant__label" for="ProductSelect-6694898139324-option-1">--}}
{{--                                            Color--}}
{{--                                        </label>--}}
{{--                                        <fieldset class="variant-input-wrap" name="Color" data-index="option2" data-handle="color" id="ProductSelect-6694898139324-option-1">--}}
{{--                                            <legend class="hide">Color</legend>--}}
{{--                                            <div class="variant-input" data-index="option2" data-value="White">--}}
{{--                                                <input type="radio" checked="checked" value="White" data-index="option2" name="Color" class="variant__input-6694898139324" id="ProductSelect-6694898139324-option-color-White"><label for="ProductSelect-6694898139324-option-color-White" class="variant__button-label">White</label>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                    </div>--}}
                                    </div>
                                    <div style="margin-bottom: 10px;margin-top: 20%"><span id="alert-add-cart" style="color: green;text-align: center"></span></div>
                                    <div class="payment-buttons">
                                        <button name="add" id="addCart" class="btn btn--full btn--secondary" onclick="AddCart()" style="margin-bottom: 20px">
                                        <span id="addToCart" >Thêm vào giỏ hàng</span>
                                            </button>
                                            <button type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded _2ogcW-Q9I-rgsSkNbRiJzA _2EiMjnumZ6FVtlC7RViKtj _2-dUletcCZ2ZL1aaH0GXxT navigable" data-testid="Checkout-button" id="contact_product" onclick="BuyNow()">Mua ngay</button>
                                        <div data-shopify="payment-button" class="shopify-payment-button">
                                            <button class="shopify-payment-button__button shopify-payment-button__button--unbranded shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"></button>
                                            <button class="shopify-payment-button__more-options shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"></button>
                                        </div>
                                    </div>
                                    <textarea id="VariantsJson-6694898139324" class="hide" aria-hidden="true" aria-label="Product JSON">
                                      [{"id":39724995412156,"title":"0 \/ White","option1":"0","option2":"White","option3":null,"sku":"8814954-2295-0","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 0 \/ White","public_title":"0 \/ White","options":["0","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":2,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995444924,"title":"2 \/ White","option1":"2","option2":"White","option3":null,"sku":"8814954-2295-2","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 2 \/ White","public_title":"2 \/ White","options":["2","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":2,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995477692,"title":"4 \/ White","option1":"4","option2":"White","option3":null,"sku":"8814954-2295-4","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 4 \/ White","public_title":"4 \/ White","options":["4","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":4,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995510460,"title":"6 \/ White","option1":"6","option2":"White","option3":null,"sku":"8814954-2295-6","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 6 \/ White","public_title":"6 \/ White","options":["6","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":6,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995543228,"title":"8 \/ White","option1":"8","option2":"White","option3":null,"sku":"8814954-2295-8","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 8 \/ White","public_title":"8 \/ White","options":["8","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":6,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995575996,"title":"10 \/ White","option1":"10","option2":"White","option3":null,"sku":"8814954-2295-10","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 10 \/ White","public_title":"10 \/ White","options":["10","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":2,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995608764,"title":"12 \/ White","option1":"12","option2":"White","option3":null,"sku":"8814954-2295-12","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 12 \/ White","public_title":"12 \/ White","options":["12","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":2,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995641532,"title":"14 \/ White","option1":"14","option2":"White","option3":null,"sku":"8814954-2295-14","requires_shipping":true,"taxable":true,"featured_image":null,"available":false,"name":"Maika Cascading Ruffle Dress - 14 \/ White","public_title":"14 \/ White","options":["14","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":0,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]},{"id":39724995674300,"title":"16 \/ White","option1":"16","option2":"White","option3":null,"sku":"8814954-2295-16","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 16 \/ White","public_title":"16 \/ White","options":["16","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":3,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]}]
                                     </textarea><textarea id="CurrentVariantJson-6694898139324" class="hide" aria-hidden="true" aria-label="Variant JSON">
                                       {"id":39724995412156,"title":"0 \/ White","option1":"0","option2":"White","option3":null,"sku":"8814954-2295-0","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Maika Cascading Ruffle Dress - 0 \/ White","public_title":"0 \/ White","options":["0","White"],"price":79500,"weight":0,"compare_at_price":null,"inventory_quantity":2,"inventory_management":"momentis","inventory_policy":"deny","barcode":null,"requires_selling_plan":false,"selling_plan_allocations":[]}
                                    </textarea>
{{--                                </form>--}}
                                <p style="font-weight: 700">Mô tả:</p>
                                <div class="product-single__description rte">
                                    {!! $dress->description !!}
                                </div>
{{--                                <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom">--}}
{{--                                    <button type="button" class="label collapsible-trigger collapsible-trigger-btn collapsible-trigger-btn--borders" aria-controls="Product-content-1-6694898139324-6694898139324">--}}
{{--                                        Dress Sizes--}}
{{--                                        <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">--}}
{{--                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">--}}
{{--                                            <path d="M1.57 1.59l12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none" fill-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                    </button>--}}
{{--                                <div class="social-sharing"><a target="_blank" rel="noopener" href="//www.facebook.com/sharer.php?u=https://theiacouture.com/products/theia-maika-cascading-ruffle-dress-white" class="social-sharing__link" title="Share on Facebook">--}}
{{--                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 32 32">--}}
{{--                                            <path fill="#444" d="M18.56 31.36V17.28h4.48l.64-5.12h-5.12v-3.2c0-1.28.64-2.56 2.56-2.56h2.56V1.28H19.2c-3.84 0-7.04 2.56-7.04 7.04v3.84H7.68v5.12h4.48v14.08h6.4z" />--}}
{{--                                        </svg>--}}
{{--                                        <span class="social-sharing__title" aria-hidden="true">Share</span>--}}
{{--                                        <span class="visually-hidden">Share on Facebook</span>--}}
{{--                                    </a><a target="_blank" rel="noopener" href="//twitter.com/share?text=Maika%20Cascading%20Ruffle%20Dress&amp;url=https://theiacouture.com/products/theia-maika-cascading-ruffle-dress-white" class="social-sharing__link" title="Tweet on Twitter">--}}
{{--                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-twitter" viewBox="0 0 32 32">--}}
{{--                                            <path fill="#444" d="M31.281 6.733q-1.304 1.924-3.13 3.26 0 .13.033.408t.033.408q0 2.543-.75 5.086t-2.282 4.858-3.635 4.108-5.053 2.869-6.341 1.076q-5.282 0-9.65-2.836.913.065 1.5.065 4.401 0 7.857-2.673-2.054-.033-3.668-1.255t-2.266-3.146q.554.13 1.206.13.88 0 1.663-.261-2.184-.456-3.619-2.184t-1.435-3.977v-.065q1.239.652 2.836.717-1.271-.848-2.021-2.233t-.75-2.983q0-1.63.815-3.195 2.38 2.967 5.754 4.678t7.319 1.907q-.228-.815-.228-1.434 0-2.608 1.858-4.45t4.532-1.842q1.304 0 2.51.522t2.054 1.467q2.152-.424 4.01-1.532-.685 2.217-2.771 3.488 1.989-.261 3.619-.978z" />--}}
{{--                                        </svg>--}}
{{--                                        <span class="social-sharing__title" aria-hidden="true">Tweet</span>--}}
{{--                                        <span class="visually-hidden">Tweet on Twitter</span>--}}
{{--                                    </a><a target="_blank" rel="noopener" href="//pinterest.com/pin/create/button/?url=https://theiacouture.com/products/theia-maika-cascading-ruffle-dress-white&amp;media=//cdn.shopify.com/s/files/1/0546/6033/products/8814954_2295_1_1024x1024.jpg?v=1620055699&amp;description=Maika%20Cascading%20Ruffle%20Dress" class="social-sharing__link" title="Pin on Pinterest">--}}
{{--                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-pinterest" viewBox="0 0 32 32">--}}
{{--                                            <path fill="#444" d="M27.52 9.6c-.64-5.76-6.4-8.32-12.8-7.68-4.48.64-9.6 4.48-9.6 10.24 0 3.2.64 5.76 3.84 6.4 1.28-2.56-.64-3.2-.64-4.48-1.28-7.04 8.32-12.16 13.44-7.04 3.2 3.84 1.28 14.08-4.48 13.44-5.12-1.28 2.56-9.6-1.92-11.52-3.2-1.28-5.12 4.48-3.84 7.04-1.28 4.48-3.2 8.96-1.92 15.36 2.56-1.92 3.84-5.76 4.48-9.6 1.28.64 1.92 1.92 3.84 1.92 6.4-.64 10.24-7.68 9.6-14.08z" />--}}
{{--                                        </svg>--}}
{{--                                        <span class="social-sharing__title" aria-hidden="true">Pin it</span>--}}
{{--                                        <span class="visually-hidden">Pin on Pinterest</span>--}}
{{--                                    </a></div>--}}
                        </div>
                        </div>
                    </div>
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
            var id_now = $('#id_dress').val();
            var name = $('#name_dress').val();
            var price = $('#price_dress').val();
            var image = $('#image_dress').val();
            var slug = $('#slug_dress').val();
            $.ajax({
                url: '/shop/ajax-buy-now',
                type: 'post',
                data: {id_now: id_now, name: name, price: price, image: image, slug : slug},
                success: function (data) {
                    window.location.href = '/shop/cart-info';
                },error: function (e){
                    console.log('Lỗi! mua ngay');
                }
            })
        }
        function AddCart(){
           var id_dress = $('#id_dress').val();
           var name = $('#name_dress').val();
           var price = $('#price_dress').val();
           var image = $('#image_dress').val();
           var slug = $('#slug_dress').val();
                $.ajax({
                    url: '/shop/add-cart',
                    type: 'post',
                    data: {id: id_dress, name: name, price: price, image: image, slug : slug},
                    success: function (data) {
                        $('#alert-add-cart').text('Đã thêm sản phẩm vào giỏ hàng');
                        setTimeout(function () {
                            $('#alert-add-cart').text('');
                        },2000);
                    },error: function (e){
                        console.log('Lỗi! Thêm sản phẩm thất bại');
                    }
                })
        }
    </script>

@endsection
