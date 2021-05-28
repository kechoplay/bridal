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
                                <h1 class="h2 product-single__title">
                                    {{ $dress->name }}
                                </h1>
                                <div
                                    class="product__unit-price product__unit-price--spacing product__unit-price-wrapper--6694898139324 hide">
                                    <span class="product__unit-price--6694898139324"></span>/<span
                                        class="product__unit-base--6694898139324"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="shopify-section-product-story-sections" class="shopify-section">
        <div class="page-blocks"></div>

    </div>

@endsection
