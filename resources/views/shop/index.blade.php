@extends('shop.app')
@section('content')
    <!-- BEGIN content_for_index -->
    <div id="shopify-section-1524769873765" class="shopify-section index-section--hero">
        <div data-section-id="1524769873765" data-section-type="slideshow-section">
            <div class="slideshow-wrapper">
                <style data-shopify>
                    @media only screen and (min-width: 769px) {
                        .hero-natural--1524769873765 {
                            height: 0;
                            padding-bottom: 56.25%;
                        }
                    }
                </style>
                <style data-shopify>
                    @media screen and (max-width: 768px) {
                        .hero-natural-mobile--1524769873765 {
                            height: 0;
                            padding-bottom: 177.777777778%;
                        }
                    }
                </style>
                <div class="hero-natural--1524769873765 hero-natural-mobile--1524769873765">
                    <div id="Slideshow-1524769873765"
                         class="hero hero--natural hero--1524769873765 hero--mobile--auto loading loading--delayed"
                         data-natural="true" data-mobile-natural="true" data-autoplay="true" data-speed="7000"
                         data-dots="true" data-bars="true" data-slide-count="1">
                        <div class="slideshow__slide slideshow__slide--1524769873765-0" data-index="0"
                             data-id="1524769873765-0">
                            <style data-shopify>
                                .slideshow__slide--1524769873765-0 .hero__title {
                                    font-size: 30.0px;
                                }

                                @media only screen and (min-width: 769px) {
                                    .slideshow__slide--1524769873765-0 .hero__title {
                                        font-size: 60px;
                                    }
                                }
                            </style>
                            <div class="hero__image-wrapper"><img
                                    class="hero__image hero__image--1524769873765-0 lazyload small--hide"
                                    src="//cdn.shopify.com/s/files/1/0546/6033/files/Frame_1_824594c6-e883-4e5b-a7af-36f28dce6665_300x.png?v=1620161149"
                                    data-src="//cdn.shopify.com/s/files/1/0546/6033/files/Frame_1_824594c6-e883-4e5b-a7af-36f28dce6665_{width}x.png?v=1620161149"
                                    data-aspectratio="1.7777777777777777" data-sizes="auto" alt=""
                                    style="object-position: center center"><img
                                    class="hero__image hero__image--1524769873765-0 lazyload medium-up--hide"
                                    src="//cdn.shopify.com/s/files/1/0546/6033/files/Frame_2_ce65bb18-9c5e-4d7d-96b4-63c87683fbfc_300x.png?v=1619812800"
                                    data-src="//cdn.shopify.com/s/files/1/0546/6033/files/Frame_2_ce65bb18-9c5e-4d7d-96b4-63c87683fbfc_{width}x.png?v=1619812800"
                                    data-aspectratio="0.5625" data-sizes="auto" alt=""
                                    style="object-position: center center">
                                <noscript>
                                    <img class="hero__image hero__image--1524769873765-0"
                                         src="//cdn.shopify.com/s/files/1/0546/6033/files/Frame_1_824594c6-e883-4e5b-a7af-36f28dce6665_1400x.png?v=1620161149"
                                         alt="">
                                </noscript>
                            </div>
                            <a href="{{ route('shop.listProducts') }}" class="hero__slide-link" aria-hidden="true"></a>
                            <div class="hero__text-wrap">
                                <div class="page-width">
                                    <div class="hero__text-content vertical-bottom horizontal-center">
                                        <div class="hero__text-shadow">
                                            <h2 class="h1 hero__title">
                                                <div class="animation-cropper">
                                                    <div class="animation-contents">
                                                        Summer is here
                                                    </div>
                                                </div>
                                            </h2>
                                            <div class="hero__link">
                                                <a href="{{ route('shop.listProducts')}}" class="btn btn--inverse">
                                                    {{ __('Shop All Styles') }}
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shopify-section-1525912530555" class="shopify-section">
        <div data-section-id="1525912530555" data-section-type="promo-grid">
            <style data-shopify>
                .flex-grid--1525912530555 {
                    margin-top: -20px;
                    margin-left: -20px;

                    padding-left: 20px;
                    padding-right: 20px;

                }

                .flex-grid--1525912530555 .flex-grid--gutters {
                    margin-top: -20px;
                    margin-left: -20px;
                }

                .flex-grid--1525912530555 .flex-grid__item {
                    padding-top: 20px;
                    padding-left: 20px;
                }

                @media only screen and (max-width: 589px) {
                    .flex-grid--1525912530555 {
                        margin-top: -10px;
                        margin-left: -10px;

                        padding-left: 10px;
                        padding-right: 10px;

                    }

                    .flex-grid--1525912530555 .flex-grid--gutters {
                        margin-top: -10px;
                        margin-left: -10px;
                    }

                    .flex-grid--1525912530555 .flex-grid__item {
                        padding-top: 10px;
                        padding-left: 10px;
                    }
                }
            </style>
            <div class="promo-grid promo-grid--space-top">
                <div class="flex-grid flex-grid--gutters flex-grid--1525912530555">
                    @foreach($styles as $style)
                        <style data-shopify>
                            .flex-grid__item--1525912530555-0 {
                                min-height: 324.0px;
                            }


                            @media only screen and (min-width: 769px) {
                                .flex-grid__item--1525912530555-0 {
                                    min-height: 432.0px;
                                }
                            }

                            @media only screen and (min-width: 1140px) {
                                .flex-grid__item--1525912530555-0 {
                                    min-height: 540px;
                                }
                            }


                            .flex-grid__item--1525912530555-0 .promo-grid__text {
                                font-size: 0.7225em;
                            }

                            .flex-grid__item--1525912530555-0.flex-grid__item--50 .promo-grid__text {
                                font-size: 0.85em;
                            }

                            @media only screen and (min-width: 769px) {
                                .flex-grid__item--1525912530555-0 .promo-grid__text {
                                    font-size: 0.85em;
                                }
                            }
                        </style>
                        <div class="flex-grid__item flex-grid__item--33 flex-grid__item--1525912530555-0 type-advanced">
                            <div class="promo-grid__container vertical-bottom horizontal-center">
                                <a href="{{ route('shop.listProductsStyle', ['style' => $style->slug]) }}"
                                   class="promo-grid__slide-link" aria-hidden="true"
                                   aria-label=""></a>
                                <div class="promo-grid__bg">
                                    <style data-shopify>
                                        .promo-grid__bg-image--1525912530555-0 {
                                            object-position: center;
                                        }
                                    </style>
                                    <img
                                        class="image-fit promo-grid__bg-image promo-grid__bg-image--1525912530555-0 lazyload"
                                        src="{{ $style->img_category }}?v={{ time() }}"
                                        data-src="{{ $style->img_category }}?v={{ time() }}"
                                        data-aspectratio="0.6666666666666666" data-sizes="auto" alt="">
                                    <noscript>
                                        <img
                                            class="image-fit promo-grid__bg-image promo-grid__bg-image--1525912530555-0 lazyloaded"
                                            src="{{ $style->img_category }}?v={{ time() }}"
                                            alt="">
                                    </noscript>
                                </div>
                                <div class="promo-grid__content">
                                    <div class="promo-grid__text">
                                        <div class="rte--block rte--strong">
                                            {{ $style->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="shopify-section-1525295772132" class="shopify-section index-section">
        @if($dress->count() > 0)
            <div id="CollectionSection-1525295772132" data-section-id="1525295772132"
                 data-section-type="collection-template">
                <div class="page-width">
                    <div class="section-header">
                        <h2 class="section-header__title">
                            {{ __('New Arrivals') }}
                        </h2>
                    </div>
                </div>
                <div class="page-width page-width--flush-small">
                    <div class="grid-overflow-wrapper">
                        <div class="grid grid--uniform" data-aos="overflow__animation">
                            @foreach($dress as $dr)
                                <div class="grid__item grid-product small--one-half medium-up--one-quarter grid-product__has-quick-shop"
                                    data-aos="row-of-4"
                                    data-product-handle="theia-dana-mock-neck-midi-dress-tropical-ombre"
                                    data-product-id="6694897713340">
                                    <div class="grid-product__content">
                                        <div class="grid-product__link">
                                            <a href="{{ route('shop.productDetails', ['nameProduct' => $dr->slug]) }}">
                                                <div class="grid-product__image-mask">
                                                    <div class="image-wrap" style="height: 0; padding-bottom: 150.0%;">
                                                        <img class="grid-product__image lazyload"
                                                             data-src="{{ $dr->img[0] }}?v={{ time() }}"
                                                             data-widths="[360, 540, 720, 900, 1080]"
                                                             data-aspectratio="0.6666666666666666" data-sizes="auto" alt="">
                                                    </div>
                                                     @if(!empty($dr->img[1]))
                                                    <div class="grid-product__secondary-image small--hide">
                                                        <img class="lazyautosizes lazyloaded"
                                                             data-widths="[360, 540, 720, 1000]"
                                                             data-aspectratio="0.6665"
                                                             data-sizes="auto" alt=""
                                                             srcset="{{ $dr->img[1] }}">
                                                    </div>
                                                     @endif
                                                </div>
                                                <div class="grid-product__meta">
                                                    <div class="grid-product__title grid-product__title--body">
                                                        {{ $dr->name }}
                                                    </div>
                                                    <div class="grid-product__price"><span class="visually-hidden" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;">Regular price</span>
                                                        @if($dr->sale_price != 0)
                                                            <span class="grid-product__price--original" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;">{{ __('VNĐ') . @number_format($dr->price) }}</span>
                                                            <span class="visually-hidden" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;"></span>{{ __('VNĐ') . @number_format($dr->sale_price) }}
                                                            <span class="visually-hidden" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;"></span>({{ __('giảm :price', ['price' => $dr->discount . '%']) }})
                                                        @endif
                                                        @if($dr->sale_price == 0)
                                                            {{ __('VNĐ') . @number_format($dr->price) }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="grid__item text-center small--hide">
                                <a href="{{ route('shop.listProducts') }}" class="btn">{{ __('View all') }}</a>
                            </div>
                            <div
                                class="grid__item grid__item--view-all text-center small--one-half medium-up--one-quarter medium-up--hide">
                                <a href="{{ route('shop.listProducts') }}" class="grid-product__see-all">
                                    {{ __('View all') }}<br>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="QuickShopModal-6694897713340" class="modal modal--square modal--quick-shop"
                 data-product-id="6694897713340">
                <div class="modal__inner">
                    <div class="modal__centered">
                        <div class="modal__centered-content">
                            <div id="QuickShopHolder-theia-dana-mock-neck-midi-dress-tropical-ombre"></div>
                        </div>

                        <button type="button" class="modal__close js-modal-close text-link">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close"
                                 viewBox="0 0 64 64">
                                <path d="M19 17.61l27.12 27.13m0-27.12L19 44.74"/>
                            </svg>
                            <span class="icon__fallback-text">"Close (esc)"</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
